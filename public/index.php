<?php
declare(strict_types=1);

use App\Routes;
use Relay\Relay;
use App\Container;
use Middlewares\FastRoute;
use Zend\Diactoros\Response;
use Middlewares\RequestHandler;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$middlewareQueue[] = new FastRoute(Routes::routeBuilder());
$middlewareQueue[] = new RequestHandler(Container::build());

$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emitter = new SapiEmitter();
return $emitter->emit($response);
