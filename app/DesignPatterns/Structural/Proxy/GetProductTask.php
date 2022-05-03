<?php

namespace App\DesignPatterns\Structural\Proxy;

use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;
use App\DesignPatterns\Structural\Proxy\Repositories\ProductRepository;

class GetProductTask
{
     public function run(int $productId)
     {
         return (new ProductRepository())->find($productId);
     }

     public function runImpl(int $productId)
     {
         return app(ProductRepositoryInterface::class)->find($productId);
     }
}
