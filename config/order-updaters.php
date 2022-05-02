<?php

use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;

return [
    'fromWeb' => [
      [
          'name' => 'log',
          'enabled' => 1,
          'decorator_class' => OrderUpdateDecoratorLogger::class,
      ], [
          'name' => 'notifyUser',
          'enabled' => 1,
          'decorator_class' => OrderUpdateDecoratorNotifierUsers::class,
      ], [
          'name' => 'notifyManagers',
          'enabled' => 1,
          'decorator_class' => OrderUpdateDecoratorNotifierManagers::class,
      ]
    ],
    'fromAdmin' => [
        [
            'name' => 'log',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorLogger::class,
        ], [
            'name' => 'notifyManagers',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorNotifierManagers::class,
        ]
    ],
];
