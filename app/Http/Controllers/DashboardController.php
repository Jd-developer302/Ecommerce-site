<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use PDF;

use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // dd($request->all());
        $statusCounts = DB::table('orders')
            ->selectRaw('status, COUNT(*) as count, (COUNT(*) * 100 / (SELECT COUNT(*) FROM orders)) as percentage')
            ->groupBy('status')
            ->get();
            

        $todayCounts = DB::table('orders')
            ->selectRaw('status, COUNT(*) as count, (COUNT(*) * 100 / (SELECT COUNT(*) FROM orders WHERE DATE(created_at) = ?)) as percentage', [Carbon::today()->toDateString()])
            ->whereDate('created_at', Carbon::today())
            ->groupBy('status')
            ->get();

        // $orderDriverCounts = Order::join('users', 'orders.delivery_boy_id', '=', 'users.id')
        //     ->whereNotNull('orders.delivery_boy_id')
        //     ->whereDate('orders.created_at', Carbon::today())
        //     ->select('users.name as driver_name', DB::raw('COUNT(orders.id) as count'))
        //     ->groupBy('users.name')
        //     ->get();

        ////////*   Modified Query to Fetch All Order Statuses with Counts    *////////

        $fromDate = $request->query('fromDate') ? Carbon::parse($request->query('fromDate')) : null;
        $toDate = $request->query('toDate') ? Carbon::parse($request->query('toDate')) : null;

        $statuses = [
            'ORDER PLACED',
            'TO BE CONFIRMED',
            'ORDER CONFIRMED',
            'INVOICE PRINTED',
            'PACKED',
            'ASSIGNED TO RIDER',
            'ATTENDED',
            'PICKEDUP',
            'RESHEDULED',
            'DELIVERED',
            'CANCELLED',
            'NO ANSWER',
            'OUT FOR DELIVERY',
        ];

        $orderFilter = Order::query()
            ->select('orders.status', DB::raw('COUNT(orders.id) as count'))
            ->whereNotNull('orders.id');

        if ($fromDate && $toDate) {
            $orderFilter->whereDate('orders.created_at', '>=', $fromDate)
                ->whereDate('orders.created_at', '<=', $toDate);
            $date = $fromDate->format('M d, Y') . ' - ' . $toDate->format('M d, Y');
        } else {
            $orderFilter->whereDate('orders.created_at', Carbon::today());

            $date = Carbon::today()->format('M d, Y');
        }

        $orderFilter = $orderFilter->groupBy('orders.status')
            ->orderBy('count', 'desc')
            ->get();


        
        $mappedResults = collect($statuses)->map(function ($status) use ($orderFilter) {
            $order = $orderFilter->firstWhere('status', $status);
            return [
                'status' => $status,
                'count' => $order ? $order->count : 0,
            ];
        });



        // Calculate the total count
        $allTotalOrders = $mappedResults->sum('count');

        // Add percentage calculation
        $orderFilter = $mappedResults->map(function ($item) use ($allTotalOrders) {
            $item['percentage'] = $allTotalOrders > 0 ? round(($item['count'] / $allTotalOrders) * 100, 2) : 0;
            return $item;
        });




        ////////*   Modified Query to Fetch All Order Statuses with Counts End   *////////

        $roles = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('roles.*')
            ->where('users.id', auth()->user()->id)
            ->get();
        $filtered = $roles->filter(function ($item) {
            return $item->name === 'Admin';
        });
        if (count($filtered) > 0) {
            $is_admin = true;
        } else {
            $is_admin = false;
        }

        $usersCount = User::whereHas('roles', fn($query) => $query->where('name', 'Customer'))->count();

        $newTotalOrders = Order::count();
        
        $totalCancelledOrders = Order::where('status', 'CANCELLED')->count();

        ////Recent Order Graph

        $recentOrders = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(CASE WHEN status = "DELIVERED" THEN 1 ELSE 0 END) as delivered_orders'),
            DB::raw('SUM(CASE WHEN status = "CANCELLED" THEN 1 ELSE 0 END) as cancelled_orders')
        )
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->limit(7)
            ->get();

        $totalDelivered = $recentOrders->sum('delivered_orders');
        $totalCancelled = $recentOrders->sum('cancelled_orders');

        $deliveredIncrease = ($totalDelivered > 0) ? 3.5 : 0;
        $cancelledIncrease = ($totalCancelled > 0) ? 1.2 : 0;

        $dates = $recentOrders->pluck('date')->map(fn($date) => date('d M', strtotime($date)));
        $delivered = $recentOrders->pluck('delivered_orders');
        $cancelled = $recentOrders->pluck('cancelled_orders');
        // dd($cancelled);
        //our code for charts and others

        $ordersDuration = $request->query('duration') ?? 'all-time';

        $end = Carbon::now();
        // For Employer Registrations
        $orderData = $this->getOrderData($ordersDuration);
        $orderChartData = $orderData['data'];
        $orderLables = $orderChartData->pluck("date")->toArray();
        $orderDataValues = $orderChartData->pluck("count")->toArray();
        $orderStart = $orderData['start'];
        $orderTimeUnit = $orderData['timeUnit'];


        $orderChart =
            Chartjs::build()->name("OrderChart")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->labels($orderLables)
            ->datasets([
                [
                    "label" => "Orders",
                    "backgroundColor" => "rgba(228, 161, 27, 0.9)",
                    "borderColor" => "rgba(198, 139, 22, 0.8)",
                    "data" => $orderDataValues
                ]
            ])->options([
                'scales' => [
                    'x' => [
                        'type' => 'time',
                        'time' => [
                            'unit' => $orderTimeUnit
                        ],
                        'min' => $orderStart->format("Y-m-d H:i"),
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'User Registrations'
                    ]
                ]
            ]);

        //Sales Char Data ...

        $salesDuration = $request->query('sale_duration') ?? 'all-time';


        $end = Carbon::now();
        // For Employer Registrations
        $saleData = $this->getSalesData($salesDuration);
        $salesChartData = $saleData['data'];
        $salesLables = $salesChartData->pluck("date")->toArray();
        $salesDataValues = $salesChartData->pluck("count")->toArray();
        $saleStart = $saleData['start'];
        $saleTimeUnit = $saleData['timeUnit'];


        $salesChart =
            Chartjs::build()->name("SalesChart")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->labels($salesLables)
            ->datasets([
                [
                    "label" => "Sales",
                    "backgroundColor" => "rgba(228, 161, 27, 0.9)",
                    "borderColor" => "rgba(198, 139, 22, 0.8)",
                    "data" => $salesDataValues
                ]
            ])->options([
                'scales' => [
                    'x' => [
                        'type' => 'time',
                        'time' => [
                            'unit' => $saleTimeUnit
                        ],
                        'min' => $saleStart->format("Y-m-d H:i"),
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'User Registrations'
                    ]
                ]
            ]);




        // Get the duration parameter from the request, default is 'week'
        $duration = $request->query('duration', 'week');

        // Determine the start date based on the selected duration
        $startDate = match ($duration) {
            'week' => Carbon::now()->subWeeks(1),
            'month' => Carbon::now()->subMonths(1),
            default => Carbon::now()->subDays(1),
        };

        // Fetch total orders and total sales within the given duration
        $totalOrders = Order::whereDate('created_at', Carbon::today())->count();
        $totalSales = Order::where('created_at', '>=', $startDate)->sum('total_price');

        // Fetch sales and order data grouped by date for chart visualization
        $analyticsData = Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total_sales, COUNT(*) as total_orders')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Prepare data for the chart
        $labels = $analyticsData->pluck('date')->toArray(); // Date labels for the chart
        $salesValues = $analyticsData->pluck('total_sales')->toArray(); // Total sales for the chart
        $orderValues = $analyticsData->pluck('total_orders')->toArray(); // Total orders for the chart

        // Build the chart
        $analyticsChart = Chartjs::build()->name("AnalyticsChart")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Total Sales",
                    "backgroundColor" => "rgba(205, 192, 192, 0.2)",
                    "borderColor" => "rgba(228, 161, 27, 1)",
                    "borderWidth" => 2,
                    "data" => $salesValues,
                    "fill" => true,
                    "tension" => 0.4,
                ],
                [
                    "label" => "Total Orders",
                    "backgroundColor" => "rgba(252, 236, 203, 1)",
                    "borderColor" => "rgba(228, 161, 27, 1)",
                    "borderWidth" => 2,
                    "data" => $orderValues,
                    "fill" => true,
                    "tension" => 0.4,
                ],
            ])
            ->options([
                'responsive' => true,
                'plugins' => [
                    'legend' => ['position' => 'top'],
                    'title' => ['display' => true, 'text' => 'Sales and Orders Analytics'],
                ],
                'scales' => [
                    'x' => ['title' => ['display' => true, 'text' => 'Date']],
                    'y' => ['title' => ['display' => true, 'text' => 'Count / Total Sales'], 'min' => 0],
                ],
            ]);




        $statuses = [
            'ORDER PLACED',
            'TO BE CONFIRMED',
            'ORDER CONFIRMED',
            'INVOICE PRINTED',
            'PACKED',
            'ASSIGNED TO RIDER',
            'ATTENDED',
            'PICKEDUP',
            'RESHEDULED',
            'DELIVERED',
            'CANCELLED',
            'NO ANSWER',
            'OUT FOR DELIVERY'
        ];

        // Fetch status counts
        $statusCounts = DB::table('orders')
            ->selectRaw('status, COUNT(*) as count, (COUNT(*) * 100 / (SELECT COUNT(*) FROM orders)) as percentage')
            ->whereDate('created_at', Carbon::today())
            ->groupBy('status')
            ->get()
            ->keyBy('status')
            ->toArray();

        // Ensure all statuses are included
        $statusData = [];
        foreach ($statuses as $status) {
            $statusData[] = [
                'status' => $status,
                'count' => $statusCounts[$status]->count ?? 0,
                'percentage' => $statusCounts[$status]->percentage ?? 0,
            ];
        }
        //////*    Daily base graph    *//////////
        $todayAnalytics = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total_orders, SUM(total_price) as total_sales')
            ->whereDate('created_at', Carbon::today())
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $todayLabels = $todayAnalytics->pluck('date')->toArray();
        $todayOrderValues = $todayAnalytics->pluck('total_orders')->toArray();
        $todaySalesValues = $todayAnalytics->pluck('total_sales')->toArray();


        $todayChart = Chartjs::build()->name("TodayChart")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->labels($todayLabels)
            ->datasets([
                [
                    "label" => "Today Total Orders",
                    "backgroundColor" => "rgba(205, 192, 192, 0.2)",
                    "borderColor" => "rgba(228, 161, 27, 1)",
                    "borderWidth" => 2,
                    "data" => $todayOrderValues,
                ],
                [
                    "label" => "Today Total Sales",
                    "backgroundColor" => "rgba(252, 236, 203, 1)",
                    "borderColor" => "rgba(228, 161, 27, 1)",
                    "borderWidth" => 2,
                    "data" => $todaySalesValues,
                ],
            ])
            ->options([
                'responsive' => true,
                'plugins' => [
                    'legend' => ['position' => 'top'],
                    'title' => ['display' => true, 'text' => 'Today\'s Orders and Sales'],
                ],
                'scales' => [
                    'x' => ['title' => ['display' => true, 'text' => 'Date']],
                    'y' => ['title' => ['display' => true, 'text' => 'Count / Sales'], 'min' => 0],
                ],
            ]);

        ///////*    Daily base graph End    *//////////






        return view('winscart_dashboard', [
            'statusCounts' => $statusCounts,
            'statusData' => $statusData,
            'todayCounts' => $todayCounts,
            'is_admin' => $is_admin,
            'newTotalOrders' => $newTotalOrders,
            'totalCancelledOrders' => $totalCancelledOrders,
            'usersCount' => $usersCount,
            'orderChart' => $orderChart,
            'salesChart' => $salesChart,
            'orderFilter' => $orderFilter,
            'date' => $date,
            'allTotalOrders' => $allTotalOrders,
            'dates' => $dates,
            'delivered' => $delivered,
            'cancelled' => $cancelled,
            'totalDelivered' => $totalDelivered,
            'totalCancelled' => $totalCancelled,
            'deliveredIncrease' => $deliveredIncrease,
            'cancelledIncrease' => $cancelledIncrease,
            'analyticsChart' => $analyticsChart,
            'duration' => $duration, // Keep track of the selected duration
            'totalOrders' => $totalOrders,
            'totalSales' => $totalSales,
            'todayChart' => $todayChart,
        ]);
    }

    public function filter(Request $request)
    {
        $fromDate = Carbon::parse($request->get('fromDate'));
        $toDate = Carbon::parse($request->get('toDate'));

        $statusCounts = DB::table('orders')
            ->selectRaw('status, COUNT(*) as count, (COUNT(*) * 100 / (SELECT COUNT(*) FROM orders)) as percentage')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->groupBy('status')
            ->get();

        $roles = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('roles.*')
            ->where('users.id', auth()->user()->id)
            ->get();

        $is_admin = $roles->contains(fn($role) => $role->name === 'Admin');

        return view('winscart_dashboard', [
            'statusCounts' => $statusCounts,
            'is_admin' => $is_admin,
            'fromDate' => $fromDate->format('Y-m-d'),
            'toDate' => $toDate->format('Y-m-d'),
        ]);
    }



    protected function getOrderData($duration)
    {
        $end = Carbon::now();
        $start = $this->getStartDateBasedOnDuration($duration, $end);
        $timeUnit = $this->getTimeUnit($duration);

        // Return both the data and the necessary values for the chart
        $period = CarbonPeriod::create($start, $this->getPeriodStep($duration), $end);

        $data = collect($period)->map(function ($date) use ($duration) {
            return $this->mapOrderDurationData($date, $duration);
        });

        return [
            'data' => $data,
            'start' => $start,
            'timeUnit' => $timeUnit
        ];
    }


    protected function getStartDateBasedOnDuration($duration)
    {
        switch ($duration) {
            case 'today':
                return Carbon::now()->startOfDay();
            case 'month':
                return Carbon::now()->startOfMonth();
            case 'last-month':
                return Carbon::now()->subMonth()->startOfMonth();
            case 'year':
                return Carbon::now()->startOfYear();
            case 'this-week':
                return Carbon::now()->startOfWeek();
            case 'last-week':
                return Carbon::now()->subWeek()->startOfWeek();
            default:
                return Carbon::parse(User::withoutGlobalScopes()->min("created_at"));
        }
    }

    protected function getTimeUnit($duration)
    {
        switch ($duration) {
            case 'today':
                return 'hour';
            case 'month':
            case 'last-month':
                return 'day';
            case 'year':
                return 'month';
            case 'this-week':
            case 'last-week':
                return 'day';
            default:
                return 'month';
        }
    }

    protected function getPeriodStep($duration)
    {
        switch ($duration) {
            case 'today':
                return '1 hour';
            case 'month':
            case 'last-month':
                return '1 day';
            case 'year':
                return '1 month';
            case 'this-week':
            case 'last-week':
                return '1 day';
            default:
                return '1 month';
        }
    }


    protected function mapOrderDurationData($date, $duration)
    {
        if ($duration == 'today') {
            $endDate = $date->copy()->endOfHour();
            $startDate = $date->copy()->startOfHour();
            $name = $endDate->format("H: i");
        } elseif (in_array($duration, ['month', 'last-month', 'this-week', 'last-week'])) {
            $endDate = $date->copy()->endOfDay();
            $startDate = $date->copy()->startOfDay();
            $name = $endDate->format("D");
        } else {
            $endDate = $date->copy()->endOfMonth();
            $startDate = $date->copy()->startOfMonth();
            $name = $endDate->format("M");
        }

        return [
            "count" => Order::where("created_at", ">=", $startDate)->where("created_at", "<=", $endDate)->count(),
            "date" => $name
        ];
    }



    protected function getSalesData($duration)
    {
        $end = Carbon::now();
        $start = $this->getStartDateBasedOnDuration($duration, $end);
        $timeUnit = $this->getTimeUnit($duration);

        // Return both the data and the necessary values for the chart
        $period = CarbonPeriod::create($start, $this->getPeriodStep($duration), $end);

        $data = collect($period)->map(function ($date) use ($duration) {
            return $this->mapSaleDurationData($date, $duration);
        });

        return [
            'data' => $data,
            'start' => $start,
            'timeUnit' => $timeUnit
        ];
    }


    protected function mapSaleDurationData($date, $duration)
    {
        if ($duration == 'today') {
            $endDate = $date->copy()->endOfHour();
            $startDate = $date->copy()->startOfHour();
            $name = $endDate->format("H: i");
        } elseif (in_array($duration, ['month', 'last-month', 'this-week', 'last-week'])) {
            $endDate = $date->copy()->endOfDay();
            $startDate = $date->copy()->startOfDay();
            $name = $endDate->format("D");
        } else {
            $endDate = $date->copy()->endOfMonth();
            $startDate = $date->copy()->startOfMonth();
            $name = $endDate->format("M");
        }

        return [
            "count" => Order::whereDate("created_at", '>=', $startDate)->whereDate('created_at', '<=', $endDate)
                ->selectRaw('SUM(total_price + delivery_charge + total_vat - IFNULL(coupon_price, 0)) as sum_final_price')
                ->value('sum_final_price'),
            "date" => $name
        ];
    }
}
