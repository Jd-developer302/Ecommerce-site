<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\WithColumnWidths;


class ReportExport implements FromCollection, WithHeadings, WithColumnWidths
{
    protected $ids;

    function __construct($ids)
    {
        $this->ids = $ids;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function map($order): array
    {
        return [
            $order->order_id,
            $order->name,
            $order->phone,
            $order->phone,
            $order->email,
            'UAE',
            $order->city,
            $order->city,
            $order->address,
            $order->product_name,
            'digital product',
            '',
            $order->quantity,
            '1',
            '1',
            'cash',
            $order->total_price,
            $order->remark,
            'total_price',
            'bill amt',
            'bill amt',
            'no',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, // Set width of column A to 15
            'B' => 15, // Set width of column B to 20
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 20,
            'G' => 30,
            'H' => 15,
            'I' => 15,
            'J' => 15,
        ];
    }

    public function collection()
    {
        if ($this->ids != "") {
            if (is_array($this->ids)) {
                $str_arr = $this->ids;
            } else {
                $str_arr = explode(",", $this->ids);
            }
            // $data = DB::table('orders')
            //     ->Join('order_lines', 'orders.order_id', '=', 'order_lines.order_id')
            //     ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
            //     ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id', 'left')
            //     ->select('orders.order_id', 'orders.name', 'orders.areacode', 'orders.phone', 'orders.email', 'orders.city', 'orders.address', 'orders.total_qty', 'order_lines.delivery_charge', 'orders.total_price', 'orders.status', 'orders.created_at', 'order_lines.product_id', 'order_lines.combination_id', 'order_lines.name as product_name', 'order_lines.quantity', 'order_lines.price', 'order_lines.sub_price', 'order_lines.vat', 'products.name as pname', 'bundles.name as bname', 'products.name as pname', 'bundles.name as bname')
            //     ->whereIn('orders.order_id', $str_arr)
            //     ->get();
            $data = $this->getOrders($str_arr);
        } else {
            // return Order::all();
            $order_ids = session()->get('order_ids');
            if (isset($order_ids)) {
                //$data = DB::table('orders')
                // ->Join('order_lines', 'orders.order_id', '=', 'order_lines.order_id')
                // ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
                // ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id', 'left')
                // ->select('orders.order_id', 'orders.name', 'orders.areacode', 'orders.phone', 'orders.email', 'orders.city', 'orders.address', 'orders.total_qty', 'order_lines.delivery_charge', 'orders.total_price', 'orders.status', 'orders.created_at', 'order_lines.product_id', 'order_lines.combination_id', 'order_lines.name as product_name', 'order_lines.quantity', 'order_lines.price', 'order_lines.sub_price', 'order_lines.vat', 'products.name as pname', 'bundles.name as bname')
                // ->whereIn('orders.order_id', $order_ids)
                // ->get();
                $data = $this->getOrders($order_ids);
                session()->forget('order_ids');
            } else {
                $data = DB::table('orders')
                    ->Join('order_lines', 'orders.order_id', '=', 'order_lines.order_id')
                    ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
                    ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id', 'left')
                    ->select('orders.order_id', 'orders.name', 'orders.areacode', 'orders.phone', 'orders.email', 'orders.city', 'orders.address', 'orders.total_qty', 'orders.total_vat','order_lines.delivery_charge', 'orders.total_price', 'orders.coupon_price', 'orders.status', 'orders.created_at', 'order_lines.product_id', 'order_lines.combination_id', 'order_lines.name as product_name', 'order_lines.quantity', 'order_lines.price', 'order_lines.sub_price', 'order_lines.vat', 'products.name as pname', 'bundles.name as bname')
                    ->get();
                // $data = $this->getOrders();
            }
        }
        $data = collect($data)->map(function ($item) {
            $mobile = $item->areacode . $item->phone;
            // if ($item->pname != null) {
            //     $itemName = $item->pname;
            // } else {
            //     $itemName = $item->bname;
            // }
            static $row_number = 0;
            $row_number++;
            $dc = $item->delivery_charge-$item->coupon_price;
            return [
                $row_number,
                $item->order_id,
                $item->name,
                $mobile,
                $item->city,
                $item->address,
                $item->product_names,
                $item->total_qty,
                $item->total_vat,
                $dc,
                $item->total_price,
            ];
        });
        return $data;
    }
    /**
     * @return array
     */
    public function headings(): array
    {
        // Define the headings for the Excel file
        return [
            'Sl. No.',
            'Order No',
            'Customer Name',
            'Customer Mobile',
            'Customer City',
            'Customer Address',
            'Product Name',
            'Quantity',
            'Tax',
            'Delivery Charge Collected',
            'Total Price',
        ];
    }
    ///////////////////////////
    public function getOrders($order_id_arr)
    {
        $orders = [];
        $chunkSize = 1000;

        $subquery = DB::table('order_lines')
            ->leftJoin('products', 'order_lines.product_id', '=', 'products.id')
            ->leftJoin('bundles', 'order_lines.bundle_id', '=', 'bundles.id')
            ->select('order_lines.order_id', DB::raw("GROUP_CONCAT(IFNULL(products.name, bundles.name) SEPARATOR '|') AS product_names"))
            ->groupBy('order_lines.order_id');

        DB::table('orders')
            ->leftJoinSub($subquery, 'order_lines', function ($join) {
                $join->on('orders.order_id', '=', 'order_lines.order_id');
            })
            ->select(
                'orders.order_id',
                'orders.name',
                'orders.areacode',
                'orders.phone',
                'orders.email',
                'orders.city',
                'orders.address',
                'orders.total_qty',
                'orders.delivery_charge',
                'orders.total_price',
                'orders.status',
                'orders.created_at',
                'orders.delivery_boy_id',
                'order_lines.product_names',
                'orders.coupon_price'
            )
            ->whereIn('orders.order_id', $order_id_arr)
            ->orderBy('orders.order_id')
            ->chunk($chunkSize, function ($results) use (&$orders) {
                foreach ($results as $order) {
                    $orders[] = $order;
                }
            });
        return $orders;
        //dd($orders);
    }
}
