<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $orderId = DB::table('INFORMATION_SCHEMA.TABLES')
            ->where('table_name', '=', 'orders')
            ->where('table_schema', '=', DB::getDatabaseName())
            ->value('AUTO_INCREMENT');
        $orderNo = "UAE1000" . $orderId;
        return new Order([
            'name'     => $row['name'],
            'order_id'    => $orderNo,
            'phone'     => $row['contact_number'],
            'email'    => '',
            'city'     => $row['city'],
            'address'    => $row['address'],
            'status'     => 'ORDER PLACED',
            'total_price' => '100',
            // 'total_price' => $row['product_total_price']
        ]);
    }
}
