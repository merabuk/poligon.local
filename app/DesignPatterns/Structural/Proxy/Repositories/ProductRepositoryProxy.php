<?php

namespace App\DesignPatterns\Structural\Proxy\Repositories;

use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;

class ProductRepositoryProxy implements ProductRepositoryInterface
{
    private ProductRepositoryInterface $obj;

    public function __construct()
    {
        $this->obj = new ProductRepositoryImpl();
    }

    public function find(int $productId)
    {
        $key = 'getProduct_' . $productId;
        $ttl = config('cache.products.find', 1000);

        return cache()->remember($key, $ttl, function () use ($productId) {
            return 'PROXY::' . $this->obj->find($productId);
        });
    }
}
