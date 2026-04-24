<?php

namespace App\Imports;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImileImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $order = Order::where('order_id',$row['imile_reference_no'])->first();
            if ($order) {
                $order->awb = $row['waybill_no'];
                $order->status = 'PICKEDUP';
                $order->delivery_boy_id = 21;
                $order->shipped_date = date('Y-m-d');
                $order->save();
                OrderStatus::create([
                    'order_id' => $row['imile_reference_no'],
                    'status' => 'ASSIGNED TO RIDER',
                    'changed_by' =>  auth()->user()->name,
                    'user_id' => auth()->user()->id,
                    'comment' => 'Added from excel'
                ]);
                OrderStatus::create([
                    'order_id' => $row['imile_reference_no'],
                    'status' => 'PICKEDUP',
                    'changed_by' =>  auth()->user()->name,
                    'user_id' => auth()->user()->id,
                    'comment' => 'Added from excel'
                ]);
            }
        }
    }
}
