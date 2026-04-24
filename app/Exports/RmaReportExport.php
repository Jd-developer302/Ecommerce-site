<?php

namespace App\Exports;

use App\Models\Bundle;
use App\Models\RmaLine;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class RmaReportExport implements FromCollection, WithHeadings, WithColumnWidths
{
    protected $ids;

    function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        $orderIds = !empty($this->ids)
            ? (is_array($this->ids) ? $this->ids : explode(",", $this->ids))
            : session()->pull('order_ids', []);

        $data = DB::table('rmas')
            ->join('orders', 'rmas.order_id', '=', 'orders.order_id')
            ->select(
                'rmas.id',
                'rmas.order_id',
                'orders.name as customer_name',
                'orders.phone as customer_phone',
                'orders.city as customer_city',
                'orders.address as customer_address',
                'rmas.status',
                'orders.total_qty',
                'orders.delivery_charge',
                'orders.coupon_price',
                'orders.total_vat',
                'orders.total_price'
            )
            ->whereIn('rmas.order_id', $orderIds)
            ->get()
            ->unique();

        return $data->map(function ($item, $index) {
            return [
                $index + 1, // Serial Number
                $item->order_id,
                $item->customer_name,
                $item->customer_phone,
                $item->customer_city,
                $item->customer_address,
                $this->getPname($item->order_id), // Fetch product details
                $item->status,
                $item->total_qty,
                max(0, $item->delivery_charge - $item->coupon_price), // Ensure non-negative delivery charge
                $item->total_vat,
                $item->total_price,
            ];
        });
    }

    public function headings(): array
    {
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

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 15,
            'C' => 20,
            'D' => 15,
            'E' => 15,
            'F' => 30,
            'G' => 40,
            'H' => 15,
            'I' => 10,
            'J' => 20,
            'K' => 10,
            'L' => 15,
        ];
    }

    private function getPname($orderId)
    {
        $lines = RmaLine::where('rma_id', $orderId)->get();
        $pname = $lines->map(function ($line) {
            if ($line->product_id) {
                $product = Product::find($line->product_id);
            } else {
                $product = Bundle::find($line->bundle_id);
            }
            return $product ? "{$product->name}|{$product->sku}|{$line->quantity}|{$product->price}" : '';
        })->implode(', ');

        return $pname ?: 'N/A';
    }
}
