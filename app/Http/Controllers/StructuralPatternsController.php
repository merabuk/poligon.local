<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Structural\Decorator\DecoratorApp;
use App\DesignPatterns\Structural\Decorator\DecoratorAppSettings;
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
}
