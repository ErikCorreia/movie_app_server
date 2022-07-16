<?php
use App\Controller\UserController;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;
use Tuupola\Middleware\CorsMiddleware as CorsMiddleware;


require_once "vendor/autoload.php";

// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true,
]];


$app = new \Slim\App($config);

$app->add(new CorsMiddleware([
    "origin" => ["*"],
    "methods" => ["GET", "POST", "PATCH", "DELETE", "OPTIONS"],    
    "headers.allow" => ["Origin", "Content-Type", "Authorization", "Accept", "ignoreLoadingBar", "X-Requested-With", "Access-Control-Allow-Origin"],
    "headers.expose" => [],
    "credentials" => true,
    "cache" => 0,        
]));

$app->get('/', UserController::class . ':index');

$app->post('/user/login', UserController::class . ':getUsers');
$app->post('/user/create', UserController::class . ':createUser');


// $app->options('/user/login', function ($request, $response, $args) {
//     return $response;
// });
// $app->options('user/create', function ($request, $response, $args) {
//     return $response;
// });

$app->run();