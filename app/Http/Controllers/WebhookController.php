<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function jandTWebhook(Request $request)
    {
        $bizContent = json_decode($request->bizContent);
        $awb = $bizContent->billCode;
        $order = Order::where('awb', $awb)->first();
        if ($order) {
            $order->awb_details = $bizContent->details;
            foreach ($bizContent->details as $item) {
                if ($order->status != 'DELIVERED') {
                    if ($item->scanType == 'Delivery scan') {
                        $order->status = 'DELIVERED';
                        break;
                    }
                }
            }
            $order->save();
        }
        // Handle the webhook request here
        // You can access the form data using $request->input('field_name')
        // Example: $fieldValue = $request->input('field_name');

        // Return a response if necessary
        $response = ['code' => 1, 'message' => 'success'];
        return $response;
    }
}
