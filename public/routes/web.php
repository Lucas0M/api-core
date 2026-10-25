<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Chamado;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/chamados', function () {
    return Chamado::all();
});
