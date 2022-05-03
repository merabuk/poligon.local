<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Structural\Decorator\DecoratorApp;
use App\DesignPatterns\Structural\Decorator\DecoratorAppSettings;
use App\DesignPatterns\Structural\Dto\CreateProductDtoFactory;
use App\DesignPatterns\Structural\Proxy\GetProductTask;
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
    public function withoutDto(CreateProductRequest $request)
    {
        $result = app(CreateProductAction::class)->run($request);

        return $this->response($result);
    }

    /**
     * Заместитель (англ. Proxy) — структурный шаблон проектирования, предоставляющий объект,
     * который контролирует доступ к другому объекту, перехватывая все вызовы
     * (выполняет функцию контейнера).
     * https://ru.wikipedia.org/wiki/Заместитель_(шаблон_проектирования)
     *
     * Заместитель позволяет создать промежуточный слой между бизнес-логикой приложения и деталями.
     *
     * Пример:
     * В существующий класс реализованный как деталь (плагин) для основной бизнес-логики
     * требуется добавить некую дополнительную функциональность:
     * 1) Кеширование
     * 2) Проверка доступа перед исполнением
     * 3) Шифрование запроса перед отправкой (расшифровка ответа)
     * 4) Логирование
     * 5) Анализ кол-ва обращений и т.п.
     * ... и т.п.
     *
     * @link http://127.0.0.1:8000/structural/proxy
     */
    public function proxy()
    {
        $task = new GetProductTask();

        dd(
            $task->run(111),
            $task->runImpl(222),
        );
    }
}
