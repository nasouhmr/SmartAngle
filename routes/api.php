<?php

use App\Order;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('orders', function () {
    $orders = Order::all();
    $result = [];
    if ($orders) {
        foreach ($orders as $order) {
            $items = [];
            if ($order->orderItems) {
                foreach ($order->orderItems as $item) {
                    $items[] = [
                        'qtn' => $item->qtn,
                        'product' => $item->products
                    ];
                }
            }
            $row = [
                'orderNumber' => $order->order_number,
                'customer' => $order->customer,
                'items' =>  $items
            ];
            $result[] =  $row;
        }
    }
    return [
        'data' => $result,
        'status' => 200,
        'message' => 'Data retrived successfully!'
    ];
});
