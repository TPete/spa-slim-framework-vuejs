<?php

use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;
use Slim\Views\PhpRenderer;
use SPA\Controller\IndexController;
use SPA\Controller\MovieController;
use SPA\Core\Application\Port\MovieRepositoryInterface;
use SPA\Core\Infrastructure\Repository\MovieRepository;
use function DI\autowire;

require __DIR__ . '/vendor/autoload.php';

//set up container, which uses PHP-DI autowiring
$builder = new ContainerBuilder();
$builder
    ->addDefinitions([
        //manual interface resolution
        MovieRepositoryInterface::class => autowire(MovieRepository::class),
        //set template path
        PhpRenderer::class => autowire()->constructor('public'),
    ]);
$container = $builder->build();

//create app
$app = Bridge::create($container);

//automatically parse data posted in JSON, XML or form encoded format
$app->addBodyParsingMiddleware();

//routing
//api routes
$app->get('/api/movies', [MovieController::class, 'listMovies']);
$app->post('/api/movies', [MovieController::class, 'addMovie']);

//frontend routes
$app->get('/', [IndexController::class, 'index']);
$app->get('/{sth}', [IndexController::class, 'index']);

$app->run();
