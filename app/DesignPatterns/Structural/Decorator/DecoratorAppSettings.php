<?php

namespace App\DesignPatterns\Structural\Decorator;

use App\DesignPatterns\Structural\Decorator\Classes\OrderUpdate;
use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Models\Order;
use Illuminate\Support\Collection;

class DecoratorAppSettings
{
    public function run()
    {
        $settings = $this->getEnabledSettings();
        $updateOrderObj = $this->createUpdater($settings);

        $order = new Order();
        $orderData = [];

        $updateOrderObj->run($order, $orderData);

    }

    private function getEnabledSettings(): Collection
    {
        $settings = config('order-updaters.fromWeb');

        return collect($settings)->where('enabled', 1);
    }

    private function createUpdater(Collection $settings): OrderUpdateInterface
    {
        $updateOrderObj = new OrderUpdate();

        $settings->each(function ($setting) use (&$updateOrderObj) {
            $className = $setting['decorator_class'];

            $updateOrderObj = (new $className($updateOrderObj));
        });

        return $updateOrderObj;
    }
}
