<?php

namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;

class OrderUpdateDecoratorNotifierManagers extends OrderUpdateDecoratorAbstract
{
    protected function actionAfter()
    {
        \Debugbar::info('Log Managers');
    }
}
