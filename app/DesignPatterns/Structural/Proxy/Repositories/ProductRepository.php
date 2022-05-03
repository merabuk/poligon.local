<?php

namespace App\DesignPatterns\Structural\Proxy\Repositories;

class ProductRepository
{
    public function find(int $productId)
    {
        return 'Product_' . $productId . ' from ProductRepository.';
    }
}
