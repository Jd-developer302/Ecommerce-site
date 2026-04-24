<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $Orders = DB::table('order_lines')
    //         ->join('products', 'order_lines.product_id', '=', 'products.id')
    //         ->join('orders', 'order_lines.order_id', '=', 'orders.order_id')
    //         ->select('products.id', 'products.sku', 'products.name', 'orders.status', 'orders.source', DB::raw('SUM(quantity) as total_quantity'), 'products.image')
    //         ->groupBy('products.id', 'products.sku', 'products.name', 'products.image', 'orders.status', 'orders.source')
    //         ->get();
    //     return view('reports.index', compact('Orders'));
    // }
    public function index(Request $request)
    {
        $filterDate = Carbon::now()->format('F d, Y');
        $startDate = null;
        $endDate = null;
        $type = 'orders.created_at';
        $Orders = [];

        // Handle date filters
        if ($request->has('fromDate') && $request->has('toDate')) {
            $startDate = Carbon::parse($request->fromDate)->format('Y-m-d');
            $endDate = Carbon::parse($request->toDate)->format('Y-m-d');
            $filterDate = Carbon::parse($request->fromDate)->format('F d, Y') . '-' . Carbon::parse($request->toDate)->format('F d, Y');
        }

        $query = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id')
            ->join('orders', 'order_lines.order_id', '=', 'orders.order_id')
            ->select(
                'products.id',
                'products.sku',
                'products.name', // Include product fields
                'orders.status',
                'orders.source', // Include source
                DB::raw('SUM(order_lines.quantity) as total_quantity'),
                'products.image',
                DB::raw('DATE(orders.created_at) as date'), // Include the date field
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(orders.total_price) as total_sales'),
                DB::raw('SUM(orders.total_vat) as total_tax'),
                DB::raw('SUM(order_lines.quantity) as total_products')
            )
            ->distinct(); // Ensure products are unique

        // Apply status filter
        if ($request->filled('status')) {
            $query->where('orders.status', $request->status);
            if ($request->status === 'DELIVERED') {
                $type = 'orders.delivery_date';
            }
        }

        // Apply date filters
        if ($startDate && $endDate) {
            if ($startDate === $endDate) {
                $query->whereDate($type, $startDate);
            } else {
                $query->whereBetween($type, [$startDate, $endDate]);
            }
        }

        // Apply source filter
        if ($request->filled('source')) {
            $query->where('orders.source', $request->source);
        }

        // Group results
        $Orders = $query->groupBy(
            'products.id',
            'products.sku',
            'products.name',
            'products.image',
            'orders.status',
            'orders.source', // Group by source
            'date'
        )->get();
        // dd($Orders);
        return view('reports.index', compact('Orders', 'filterDate'));
    }


    public function filter(Request $request)
    {
        $type = 'orders.created_at';
        $query = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id')
            ->join('orders', 'order_lines.order_id', '=', 'orders.order_id');
        if ($request->status != null) {
            $query = $query->where('orders.status', $request->status);
            if ($request->status == 'DELIVERED') {
                $type = 'orders.delivery_date';
            }
        }
        if ($request->start_date != null) {
            $query = $query->whereDate($type, '>=', $request->start_date);
        }
        if ($request->end_date != null) {
            $query = $query->whereDate($type, '<=', $request->end_date);
        }
        if ($request->source != null) {
            $query = $query->where('source', $request->source);
        }
        $query = $query->select('products.id', 'products.sku', 'products.name', 'orders.status', 'orders.source', DB::raw('SUM(quantity) as total_quantity'), 'products.image')
            ->groupBy('products.id', 'products.sku', 'products.name', 'products.image', 'orders.status', 'orders.source');
        $Orders = $query->get();
        // dd($Orders);
        return view('reports.index', ['Orders' => $Orders, 'data' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function sales()
    // {
    //     $sales = DB::table('orders')
    //         ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(total_price) as total_sales'), DB::raw('SUM(total_vat) as total_tax'), DB::raw('SUM(total_qty) as total_products'))
    //         ->where('status', '<>', 'CANCELLED')
    //         ->groupBy('date')
    //         ->get();

    //     return view('reports.sales', compact('sales'));
    // }

    public function sales(Request $request)
    {
        // $dateRange = $this->parseDateRange($request->input('fromDate') . ' - ' . $request->input('toDate'));

        $filteredDate = Carbon::now()->format('F d, Y');
        if ($request->has('fromDate') && $request->has('toDate')) {
            $startDate = Carbon::parse($request->fromDate)->format('Y-m-d');
            $endDate = Carbon::parse($request->toDate)->format('Y-m-d');

            $filteredDate = Carbon::parse($request->fromDate)->format('F d, Y') . '-' . Carbon::parse($request->toDate)->format('F d, Y');

            // Validate date format (use try-catch for Carbon parsing instead of hasFormat)
            try {
                $startDate = Carbon::parse($startDate)->format('Y-m-d');
                $endDate = Carbon::parse($endDate)->format('Y-m-d');
            } catch (\Exception $e) {
                // Fallback to current month's range if invalid
                $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
                $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
            }

            $type = 'orders.created_at';

            $query = DB::table('orders')
                ->select(
                    // 'orders.id',
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total_orders'),
                    DB::raw('SUM(total_price) as total_sales'),
                    DB::raw('SUM(total_vat) as total_tax'),
                    DB::raw('SUM(total_qty) as total_products'),
                    // DB::raw('SUM(gross_sale_amount) as total_gross_sales'),
                    // DB::raw('SUM(shipping_charge_collected) as total_shipping_charges')
                );

            if ($request->status !== null) {
                $query = $query->where('orders.status', $request->status);
                if ($request->status == 'DELIVERED') {
                    $type = 'orders.delivery_date';
                }
            }

            // Check if the range is a single date
            if ($startDate === $endDate) {
                $query->whereDate($type, $startDate);
            } else {
                $query->whereDate($type, '>=', $startDate)
                    ->whereDate($type, '<=', $endDate);
            }

            $sales = $query->groupBy('date')->get();
        } else {
            // Default case when no date range is provided
            $sales = DB::table('orders')
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total_orders'),
                    DB::raw('SUM(total_price) as total_sales'),
                    DB::raw('SUM(total_vat) as total_tax'),
                    DB::raw('SUM(total_qty) as total_products'),
                    // DB::raw('SUM(gross_sale_amount) as total_gross_sales'),
                    // DB::raw('SUM(shipping_charge_collected) as total_shipping_charges')
                )
                ->where('status', '<>', 'CANCELLED')
                ->groupBy('date')
                ->get();
        }

        // dd($sales);

        return view('reports.sales', compact('sales', 'filteredDate'));
    }

    public function filterSales(Request $request)
    {
        $type = 'orders.created_at';
        $query = DB::table('orders')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(total_price) as total_sales'), DB::raw('SUM(total_vat) as total_tax'), DB::raw('SUM(total_qty) as total_products'));
        if ($request->status != null) {
            $query = $query->where('orders.status', $request->status);
            if ($request->status == 'DELIVERED') {
                $type = 'orders.delivery_date';
            }
        }
        if ($request->date != null) {
            $query = $query->where($type, $request->date);
        }
        $sales = $query->groupBy('date')->get();

        return view('reports.sales', compact('sales'));
    }

    public function exportToCsv(Request $request)
    {
        $type = 'orders.created_at';
        $query = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id')
            ->join('orders', 'order_lines.order_id', '=', 'orders.order_id');
        if ($request->status != null) {
            $query = $query->where('orders.status', $request->status);
            if ($request->status == 'DELIVERED') {
                $type = 'orders.delivery_date';
            }
        }
        if ($request->start_date != null) {
            $query = $query->whereDate($type, '>=', $request->start_date);
        }
        if ($request->end_date != null) {
            $query = $query->whereDate($type, '<=', $request->end_date);
        }
        if ($request->source != null) {
            $query = $query->where('source', $request->source);
        }
        $query = $query->select('products.id', 'products.sku', 'products.name', 'orders.status', 'orders.source', DB::raw('SUM(quantity) as total_quantity'), 'products.image')
            ->groupBy('products.id', 'products.sku', 'products.name', 'products.image', 'orders.status', 'orders.source');
        $Orders = $query->get();
        $filename = "data.csv";

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        );

        $handle = fopen('php://output', 'w');

        // Add column headers
        fputcsv($handle, ['SL', 'Name', 'SKU', 'QTY']);

        // Add data rows
        $i = 0;
        foreach ($Orders as $row) {
            fputcsv($handle, [$i, $row->name, $row->sku, $row->total_quantity]);
            $i++;
        }

        fclose($handle);

        return response()->stream(
            function () {},
            200,
            $headers
        );
    }
}
