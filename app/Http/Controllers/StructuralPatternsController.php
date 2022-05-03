<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Structural\Decorator\DecoratorApp;
use App\DesignPatterns\Structural\Decorator\DecoratorAppSettings;
use App\DesignPatterns\Structural\Dto\CreateProductDtoFactory;
use Illuminate\Http\Request;

class StructuralPatternsController extends Controller
{
    /**
     * @url http://poligon.local/structural/decorator
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Decorator()
    {
        $name = 'Декоратор (Decorator)';
        $description = 'Тестовая страница для изучения шаблона (паттерна) ';

//        (new DecoratorApp())->run();
        (new DecoratorAppSettings)->run();

        return view('dump', compact('name', 'description'));
    }

    /**
     * Для любителей Porto
     * @param CreateProductRequest $request
     * @return void
     */
    public function dtoFactory(CreateProductRequest $request)
    {
        $dto = CreateProductDtoFactory::createFromRequest($request);
        $result = app(CreateProductAction::class)->run($dto);

        return $this->response($result);
    }

    /**
     * Для любителей сервисного слоя
     * @param CreateProductRequest $request
     * @return mixed
     */
    public function dtoRequest(CreateProductRequest $request)
    {
        $dto = $request->getDto();
        $result = app(CreateProductSevice::class)->run($dto);

        return $this->response($result);
    }

    /**
     * Вариант, когда DTO - зашквар,
     * а реквест пробросить в бизнес-логику типа норм
     * @param CreateProductRequest $request
     * @return mixed
     */
    public function withoutRto(CreateProductRequest $request)
    {
        $result = app(CreateProductAction::class)->run($request);

        return $this->response($result);
    }
}
