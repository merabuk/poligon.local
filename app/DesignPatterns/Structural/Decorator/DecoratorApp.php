<?php

namespace App\DesignPatterns\Structural\Decorator;

use App\DesignPatterns\Structural\Decorator\Classes\OrderUpdate;
use App\DesignPatterns\Structural\Decorator\Classes\OrderUpdateAdmin;
use App\DesignPatterns\Structural\Decorator\Classes\OrderUpdateWeb;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Models\Order;

class DecoratorApp
{
    public function run()
    {
        $order = new Order();
        $orderData = [];
        $updateOrderObj = $this->getUpdateOrderObj();

        $updateOrderObj->run($order, $orderData);
    }

    private function getUpdateOrderObj(): OrderUpdateInterface
    {
//        return new OrderUpdateDecoratorLogger(new OrderUpdate());

//        $orderUpdateLogger = new OrderUpdateDecoratorLogger(new OrderUpdate());
//        $orderUpdateNotifierManager = new OrderUpdateDecoratorNotifierManagers($orderUpdateLogger);
//        $orderUpdateNotifierUsers = new OrderUpdateDecoratorNotifierUsers($orderUpdateNotifierManager);
//        return $orderUpdateNotifierUsers;

//        return new OrderUpdateWeb();
        return new OrderUpdateAdmin();
    }
}
