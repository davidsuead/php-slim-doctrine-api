<?php

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;

$app->add(new \Slim\Middleware\Session([
    'name' => 'dummy_session',
    'autorefresh' => true,
    'lifetime' => '1 hour'
]));

$logger = new Logger("slim");
$rotating = new RotatingFileHandler($app->getLogDir() . '/jwt-' . $app->getEnvironment() . '.log', 0, Logger::DEBUG);
$logger->pushHandler($rotating);

$app->add(new Tuupola\Middleware\JwtAuthentication([
    "path" => ["/breeds"],
    "attribute" => "jwt",
    "logger" => $logger,
    "secure" => $container->environment['APP_ENV'] == 'dev' ? false : true,
    "secret" => $container->environment['APP_JWT_SECRET'],
    "error" => function ($response, $arguments) {
        $data["message"] = $arguments["message"];
        return $response->withHeader("Content-type", "application/json")
            ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));


$app->add(Function ($req,$res,$next){
   $response = $next($req,$res);
  return $response->withHeader("Access-Control-Allow-Origin","*")
       ->withHeader("Access-Control-Allow-Headers","X-Requested-With,Content-Type,Accept,Origin,Authorization")
       ->withHeader("Access-Control-Allow-Methods","GET,POST,PUT,PATCH,OPTIONS,DELETE")
       ->withHeader("Access-Control-Allow-Credentials","true");
});