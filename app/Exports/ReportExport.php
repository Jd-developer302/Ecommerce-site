<?php

namespace App\Exports;

use App\Models\Bundle;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
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
            'OMN',
            $order->city,
            $order->city,
            $order->address,
            $order->product_name,
            'digital product',
            '',
            $order->total_qty,
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
            $data = DB::table('orders')
                // ->Join('order_lines', 'orders.order_id', '=', 'order_lines.order_id')
                // ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
                // ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id', 'left')
                // ->select('orders.order_id', 'orders.name', 'orders.coupon_price', 'orders.delivery_charge', 'orders.areacode', 'orders.phone', 'orders.email', 'orders.city', 'orders.address', 'orders.total_qty', 'orders.total_vat', 'order_lines.delivery_charge', 'orders.total_price', 'orders.status', 'orders.created_at', 'order_lines.product_id', 'order_lines.combination_id', 'order_lines.name as product_name', 'order_lines.quantity', 'order_lines.price', 'order_lines.sub_price', 'order_lines.vat', 'products.name as pname', 'bundles.name as bname', 'products.sku as psku', 'bundles.sku as bsku', 'products.price as pprice', 'bundles.price as bprice')
                ->select('orders.*')
                ->whereIn('orders.order_id', $str_arr)
                ->get()->unique();
        } else {
            // return Order::all();
            $order_ids = session()->get('order_ids');
            if (isset($order_ids)) {
                $data = DB::table('orders')
                    // ->Join('order_lines', 'orders.order_id', '=', 'order_lines.order_id')
                    // ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
                    // ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id', 'left')
                    // ->select('orders.order_id', 'orders.name', 'orders.coupon_price', 'orders.delivery_charge', 'orders.areacode', 'orders.phone', 'orders.email', 'orders.city', 'orders.address', 'orders.total_qty', 'orders.total_vat', 'order_lines.delivery_charge', 'orders.total_price', 'orders.status', 'orders.created_at', 'order_lines.product_id', 'order_lines.combination_id', 'order_lines.name as product_name', 'order_lines.quantity', 'order_lines.price', 'order_lines.sub_price', 'order_lines.vat', 'products.name as pname', 'bundles.name as bname', 'products.sku as psku', 'bundles.sku as bsku', 'products.price as pprice', 'bundles.price as bprice')
                    ->select('orders.*')
                    ->whereIn('orders.order_id', $order_ids)
                    ->get()->unique();
                session()->forget('order_ids');
            } else {
                $data = DB::table('orders')
                    // ->Join('order_lines', 'orders.order_id', '=', 'order_lines.order_id')
                    // ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
                    // ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id', 'left')
                    // ->select('orders.order_id', 'orders.name', 'orders.coupon_price', 'orders.delivery_charge', 'orders.areacode', 'orders.phone', 'orders.email', 'orders.city', 'orders.address', 'orders.total_qty', 'orders.total_vat', 'order_lines.delivery_charge', 'orders.total_price', 'orders.status', 'orders.created_at', 'order_lines.product_id', 'order_lines.combination_id', 'order_lines.name as product_name', 'order_lines.quantity', 'order_lines.price', 'order_lines.sub_price', 'order_lines.vat', 'products.name as pname', 'bundles.name as bname', 'products.sku as psku', 'bundles.sku as bsku', 'products.price as pprice', 'bundles.price as bprice')
                    ->select('orders.*')
                    ->get()->unique();
            }
        }
        return $data->map(function ($item) {
            $itemName = @$this->getPname($item->order_id);
            static $row_number = 0;
            $row_number++;
            return [
                $row_number,
                $item->order_id,
                $item->name,
                $item->phone,
                $item->city,
                $item->address,
                $itemName,
                $item->status,
                $item->total_qty,
                $item->delivery_charge - $item->coupon_price,
                $item->total_vat,
                $item->total_price,
            ];
        });
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
            'Status',
            'Quantity',
            'Delivery Charge Collected',
            'Vat',
            'Total Price',
        ];
    }


    public function getPname($orderId)
    {
        $lines = OrderLine::where('order_id', $orderId)->get();
        // dd($lines);
        $pname = "";
        foreach ($lines as $line) {
            if ($line->product_id != null) {
                $product = Product::find($line->product_id);
                $pname .= $product->name . '|' . $product->sku . '|' . $line->quantity . '|' . $product->price . ', ';
            } else {
                $product = Bundle::find($line->bundle_id);
                $pname .= $product->name . '|' . $product->sku . '|' . $line->quantity . '|' . $product->price . ', ';
            }
        }
        $pname = rtrim($pname, ', ');

        return @$pname;
    }
}
