<?php

namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;

class OrderUpdateDecoratorLogger extends OrderUpdateDecoratorAbstract
{
    protected function actionBefore()
    {
        \Debugbar::info('Log Before');
    }

    protected function actionAfter()
    {
        \Debugbar::info('Log After');
    }
}
