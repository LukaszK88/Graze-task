<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

session_start();

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => false,
    ],
]);

$container = $app->getContainer();

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'graze',
    'username'  => 'root',
    'password'  => 'password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['flash'] = function ($container) {
    return new \Slim\Flash\Messages();
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false,
    ]);

    $view->addExtension( new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    $view->getEnvironment()->addGlobal('flash', $container->flash);

    return $view;
};

$container['HomeController'] = function ($container) {
    return new \Graze\Controllers\HomeController($container);
};

$container['AccountController'] = function ($container) {
    return new \Graze\Controllers\AccountController($container);
};

$container['BoxController'] = function ($container) {
    return new \Graze\Controllers\BoxController($container);
};

$container['RatingController'] = function ($container) {
    return new \Graze\Controllers\RatingController($container);
};

require __DIR__ . '/../app/routes.php';