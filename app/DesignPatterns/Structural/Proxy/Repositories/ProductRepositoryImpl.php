<?php

namespace App\DesignPatterns\Structural\Proxy\Repositories;

use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;

class ProductRepositoryImpl implements ProductRepositoryInterface
{
    public function find(int $productId)
    {
        return 'Product_' . $productId . ' from ProductRepositoryImpl';
    }
}
