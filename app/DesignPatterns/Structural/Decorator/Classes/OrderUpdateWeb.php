<?php

namespace App\DesignPatterns\Structural\Decorator\Classes;

use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Models\Order;

class OrderUpdateWeb implements OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order
    {
        $updateDecorators = $this->createStackDecorators();

        return $updateDecorators->run($order, $orderData);
    }

    private function createStackDecorators()
    {
        $orderUpdateLogger = new OrderUpdateDecoratorLogger(new OrderUpdate());
        $orderUpdateNotifierManager = new OrderUpdateDecoratorNotifierManagers($orderUpdateLogger);
        $orderUpdateNotifierUsers = new OrderUpdateDecoratorNotifierUsers($orderUpdateNotifierManager);

        return $orderUpdateNotifierUsers;
    }
}
