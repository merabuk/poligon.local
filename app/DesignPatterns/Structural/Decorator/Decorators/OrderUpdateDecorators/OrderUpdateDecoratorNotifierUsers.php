<?php

namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;

class OrderUpdateDecoratorNotifierUsers extends OrderUpdateDecoratorAbstract
{
    protected function actionAfter()
    {
        \Debugbar::info('Log Users');
    }
}
