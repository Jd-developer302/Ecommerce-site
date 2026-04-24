<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;


class OrdersExport implements FromCollection, WithHeadings
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
            $order->comment,
            'total_price',
            'bill amt',
            'bill amt',
            'no',
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
                    ->select('orders.order_id', 'orders.name', 'orders.areacode', 'orders.phone', 'orders.email', 'orders.city', 'orders.address', 'orders.total_qty', 'order_lines.delivery_charge', 'orders.total_price', 'orders.status', 'orders.created_at', 'order_lines.product_id', 'order_lines.combination_id', 'order_lines.name as product_name', 'order_lines.quantity', 'order_lines.price', 'order_lines.sub_price', 'order_lines.vat', 'products.name as pname', 'bundles.name as bname')
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
            return [
                $item->order_id,
                $item->name,
                $mobile,
                $mobile,
                $item->email,
                'UAE',
                $item->city,
                $item->city,
                $item->address,
                $item->product_names,
                'Product with Battery',
                '',
                $item->total_qty,
                '1',
                '1',
                'cash',
                $item->total_price,
                $item->comment,
                'Yes',
                $item->total_price,
                $item->total_price,
                'Not Allowed'
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
            'Reference No',
            'Customer Full Name',
            'Customer Mobile',
            'Alternative Customer Mobile',
            'Customer Email',
            'Customer Country',
            'Customer City',
            'Customer Area',
            'Customer Address',
            'Product Name',
            'Product Category',
            'Product Description',
            'Quantity of SKU',
            'Quantity of Packages',
            'Weight(kg)',
            'Payment Method',
            'COD Amount',
            'Remark',
            'Insurance',
            'Declared Value',
            'product value',
            'unpacking allowed'
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
                'orders.comment'
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
