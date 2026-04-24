<?php

namespace App\Imports;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class pandaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key > 0) {
                $order = Order::where('order_id', $row[2])->first();
                if ($order) {
                    $order->awb = $row[1];
                    $order->status = 'PICKEDUP';
                    $order->delivery_boy_id = 27;
                    $order->shipped_date = date('Y-m-d');
                    $order->save();
                    OrderStatus::create([
                        'order_id' => $row[2],
                        'status' => 'ASSIGNED TO RIDER',
                        'changed_by' =>  auth()->user()->name,
                        'user_id' => auth()->user()->id,
                        'comment' => 'Added from excel'
                    ]);
                    OrderStatus::create([
                        'order_id' => $row[2],
                        'status' => 'PICKEDUP',
                        'changed_by' =>  auth()->user()->name,
                        'user_id' => auth()->user()->id,
                        'comment' => 'Added from excel'
                    ]);
                }
            }
        }
    }
}
