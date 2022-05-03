<?php

namespace App\DesignPatterns\Structural\Dto;

/**
 * Немного усложняем - добавляем методы предоставления информации
 */
class ProductDto2
{
    public int $id;
    public string $name;
    public int $categoryId;

    public function toArray(): array
    {
        return [];
    }

    public function toJson(): string
    {
        return '';
    }
}
