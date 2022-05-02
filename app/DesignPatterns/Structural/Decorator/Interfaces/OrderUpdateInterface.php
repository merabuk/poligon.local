<?php

namespace App\DesignPatterns\Structural\Decorator\Interfaces;

use App\DesignPatterns\Structural\Decorator\Models\Order;

interface OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order;
}
