<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductStateExport implements FromCollection, WithHeadings, WithMapping
{
    protected $ids;
    protected $fromDate;
    protected $toDate;

    public function __construct($ids, $fromDate, $toDate)
    {
        $this->ids = $ids;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate; // No need to explode again, it's already an array
    }

    public function collection()
    {
        return Product::select(
            'products.id',
            'products.name',
            'products.sku',
            DB::raw('SUM(order_lines.quantity) as total_quantity'), // ✅ Sum quantities
            DB::raw('COUNT(DISTINCT order_lines.order_id) as total_orders'),
            DB::raw("(COALESCE((SELECT SUM(product_spands.total_spand) 
            FROM product_spands 
            WHERE product_spands.product_id = products.id 
            AND DATE(product_spands.date_spend) 
            BETWEEN '{$this->fromDate}' AND '{$this->toDate}'), 0)) as total_spend"),
            DB::raw("CASE 
                    WHEN SUM(order_lines.quantity) > 0 
                    THEN (COALESCE((SELECT SUM(product_spands.total_spand) 
                                    FROM product_spands 
                                    WHERE product_spands.product_id = products.id 
                                    AND DATE(product_spands.date_spend) 
                                    BETWEEN '{$this->fromDate}' AND '{$this->toDate}'), 0)) 
                         / SUM(order_lines.quantity)   -- ✅ Divide spend by total qty instead of orders
                    ELSE 0 
                 END as cost_per_sale")
        )
            ->leftJoin('order_lines', 'products.id', '=', 'order_lines.product_id')
            ->whereIn('products.id', $this->ids)
            ->whereBetween(DB::raw("DATE(order_lines.created_at)"), [$this->fromDate, $this->toDate])
            ->groupBy('products.id', 'products.name', 'products.sku')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product Name',
            'SKU',
            'Total Orders',
            'Total Quantity',
            'Total Spend',
            'Cost Per Sale',

        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->sku,
            $product->total_orders,
            $product->total_quantity,
            number_format($product->total_spend, 2),
            number_format($product->cost_per_sale, 2),  // Format to 2 decimal places
            // Format to 2 decimal places
        ];
    }
}
