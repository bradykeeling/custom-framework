<?php
declare(strict_types=1);

namespace App;

use App\HelloWorld;
use App\TestController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Routes
{
    public static function routeBuilder()
    {
        return simpleDispatcher(function(RouteCollector $r) {
            $r->get('/hello', HelloWorld::class);
            $r->get('/test', TestController::show());
        });
    }
}
