<?php

namespace App\DesignPatterns\Structural\Decorator\Classes;

use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Models\Order;

final class OrderUpdate implements OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order
    {
        \Debugbar::info('Base update');

        return $order;
    }
}
