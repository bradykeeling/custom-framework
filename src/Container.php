<?php
declare (strict_types = 1);

namespace App;

use App\HelloWorld;
use function DI\get;
use App\TestController;
use function DI\create;
use DI\ContainerBuilder;
use Zend\Diactoros\Response;

class Container
{
    public static function build()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->useAutowiring(false);
        $containerBuilder->useAnnotations(false);
        $containerBuilder->addDefinitions([
            HelloWorld::class => create(HelloWorld::class)
                ->constructor(get('Foo'), get('Response')),
            'Foo' => 'bar',
            'Response' => function() {
                return new Response();
            },
        ]);

        return $containerBuilder->build();
    }
}