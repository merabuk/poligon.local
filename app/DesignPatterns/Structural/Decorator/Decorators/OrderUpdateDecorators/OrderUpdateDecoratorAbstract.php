<?php

namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;

use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Models\Order;

abstract class OrderUpdateDecoratorAbstract implements OrderUpdateInterface
{
    /**
     * @var OrderUpdateInterface
     */
    protected $decoratedObject;

    public function __construct(OrderUpdateInterface $decoratedObject)
    {
        $this->decoratedObject = $decoratedObject;
    }

    public function run(Order $order, array $orderData): Order
    {
        $this->actionBefore();

        $this->actionMain($order, $orderData);

        $this->actionAfter();

        return $order;
    }

    protected function actionBefore()
    {

    }

    protected function actionMain($order, $orderData): Order
    {
        return $this->decoratedObject->run($order, $orderData);
    }

    protected function actionAfter()
    {

    }
}
