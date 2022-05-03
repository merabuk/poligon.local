<?php

namespace App\DesignPatterns\Structural\Dto;

/**
 * Способ любителей OOP
 *
 * Инкапсуляция ради инкапсуляции
 *
 * Данный подход преследует 2 цели
 * 1. Создание не изменяемого объекта
 * 2. Реализация инкапсуляции
 *
 * Чтобы код был "чистым" класс должен скрывать данные и предоставлять поведение.
 * Но в случае с DTO этого не требуется. DTO - это всего лишь структура данных,
 * время жизни которой не должно быть долгим. Создали, передали в другую систему. Всё.
 */
class ProductDto3
{
    private int $id;
    private string $name;
    private int $categoryId;

    public function __constructor(int $id, string $name, int $categoryId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
}
