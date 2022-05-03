<?php

namespace App\DesignPatterns\Structural\Proxy\Interfaces;

interface ProductRepositoryInterface
{
    public function find(int $productId);
}
