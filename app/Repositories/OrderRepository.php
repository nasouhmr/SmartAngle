<?php

namespace App\Repositories;

use App\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{  
    function getOrders()
    {
        return Order::all();
    } 
}
