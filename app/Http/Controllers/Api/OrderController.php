<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrders(Request $request)
    {
        $orders = $this->orderRepository->getOrders();

        return response()->json([
            'data'         => $orders,
            'message'      => 'success!',
            'error'      => 200
        ], 200);
    } 
     
}
