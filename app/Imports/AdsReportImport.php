<?php

namespace App\Imports;

use App\Models\AdsReport;
use Maatwebsite\Excel\Concerns\ToModel;

class AdsReportImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AdsReport([
            'order_id' => $row[0],
            'name' => $row[1],
            'address' => $row[2],
            'contact_number' => $row[3],
            'city' => $row[4],
            'delivery_note' => $row[5],
            'product_code' => $row[6],
            'sku_code' => '123',
            'product_name' => $row[7],
            'delivery_charge' => floatval($row[8]),
            'product_price' => floatval($row[9]),
            'quantity' => (int)explode(' ',  $row[10])[0] ,
            'product_sub_price' =>floatval($row[11]),
            'product_vat' => floatval($row[12]),
            'product_total_price' => floatval($row[13]),
            'size' => $row[14],
            'color' => $row[15],
            'daily_spend' => '123',
        ]);
    }
}
