<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\WebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/loginDriver', [DriverController::class, 'loginDriver']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->get('/orders/{user_id}', [DriverController::class, 'assignedOrders']);
Route::middleware('auth:sanctum')->post('/changeStatus', [DriverController::class, 'ChangeStatus']);

// webhook

Route::post('/jandt_webhook', [WebhookController::class, 'jandTWebhook']);
Route::post('/add_to_order', [OrdersController::class, 'addToOrder']);
