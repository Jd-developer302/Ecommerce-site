<?php

namespace App\Imports;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CamelImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            $order = Order::where('order_id', $row['barcode'])->first();
            if ($order) {
                $order->awb = $row['tracking_no'];
                $order->status = 'PICKEDUP';
                $order->delivery_boy_id = 38;
                $order->shipped_date = date('Y-m-d');
                $order->save();
                OrderStatus::create([
                    'order_id' => $row['barcode'],
                    'status' => 'ASSIGNED TO RIDER',
                    'changed_by' =>  auth()->user()->name,
                    'user_id' => auth()->user()->id,
                    'comment' => 'Added from excel'
                ]);
                OrderStatus::create([
                    'order_id' => $row['barcode'],
                    'status' => 'PICKEDUP',
                    'changed_by' =>  auth()->user()->name,
                    'user_id' => auth()->user()->id,
                    'comment' => 'Added from excel'
                ]);
            }
        }
    }
}
