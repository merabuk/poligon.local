<?php

namespace App\Providers;

use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;
use App\DesignPatterns\Structural\Proxy\Repositories\ProductRepositoryImpl;
use App\DesignPatterns\Structural\Proxy\Repositories\ProductRepositoryProxy;
use Illuminate\Support\ServiceProvider;

/**
 * Создав новый СервисПровайдер нужно его зарегистрировать в config/app.php ключ 'providers'
 */
class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
//        ProductRepositoryInterface::class => ProductRepositoryImpl::class,
        ProductRepositoryInterface::class => ProductRepositoryProxy::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(ProductRepositoryInterface::class, ProductRepositoryImpl::class);
//        $this->app->bind(ProductRepositoryInterface::class, ProductRepositoryProxy::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
