<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Src\Controllers\ApplicationsController;
use Src\Controllers\AttributeController;
use Src\Controllers\CategoryController;
use Src\Controllers\HomeController;
use Src\Controllers\ProductsController;

require __DIR__ . '/vendor/autoload.php';

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

$container->set(PhpRenderer::class, function () use ($container){
    return new PhpRenderer(__DIR__ . '/templates',
    [
        'categories' => ORM::forTable('categories')->whereNull('parent_id')->find_many(),
    ]);
});

ORM::configure('mysql:host=database;dbname=docker;charset=utf8mb4');
ORM::configure('username', 'root');
ORM::configure('password', 'tiger');

$app->get('/categories', [CategoryController::class, 'index']);
$app->get('/categories/create', [CategoryController::class, 'create']);
$app->post('/categories/create', [CategoryController::class, 'store']);
$app->get('/categories/{id}/edit', [CategoryController::class, 'edit']);
$app->post('/categories/{id}/edit', [CategoryController::class, 'update']);
$app->get('/categories/{id}/delete', [CategoryController::class, 'delete']);

$app->get('/products', [ProductsController::class, 'index']);
$app->get('/products/create', [ProductsController::class, 'create']);
$app->post('/products/create', [ProductsController::class, 'store']);
$app->get('/products/{id}/edit', [ProductsController::class, 'edit']);
$app->post('/products/{id}/edit', [ProductsController::class, 'update']);
$app->get('/products/{id}/delete', [ProductsController::class, 'delete']);
$app->get('/products/{id}/addAttributes', [ProductsController::class, 'addAttributes']);
$app->post('/products/{id}/addAttributes', [ProductsController::class, 'storeAttributes']);
$app->get('/', [HomeController::class, 'index']);
$app->get('/catalog', [HomeController::class, 'catalog']);
$app->get('/catalog/{slug}', [HomeController::class, 'show']);
$app->get('/catalog/show/{slug}', [HomeController::class, 'productshow']);
$app->get('/attributes', [AttributeController::class, 'index']);
$app->get('/attributes/create', [AttributeController::class, 'create']);
$app->post('/attributes/create', [AttributeController::class, 'store']);
$app->get('/attributes/delete/{id}', [AttributeController::class, 'delete']);
$app->get('/products/applications', [ApplicationsController::class, 'applications']);
$app->post('/products/{id}/applications', [ApplicationsController::class, 'addApplications']);
$app->get('/products/{id}/applications/edit', [ApplicationsController::class, 'edit']);
$app->post('/products/{id}/applications/edit', [ApplicationsController::class, 'update']);
$app->get('/products/{id}/applications/delete', [ApplicationsController::class, 'delete']);

$app->run();
