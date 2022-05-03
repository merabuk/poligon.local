<?php

namespace App\DesignPatterns\Structural\Dto;

use Illuminate\Http\Request;

/**
 * Расширенное использование
 * Добавили методы создания обьекта
 */
class ProductDto4
{
    public int $id;
    public string $name;
    public int $categoryId;

    public static function createFromRequest(Request $request): self
    {
        return self::createFromArray($request->validated());
    }

    private static function createFromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'];
        $dto->name = $data['name'];
        $dto->categoryId = $data['categoryId'];

        return $dto;
    }
}
