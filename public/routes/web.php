<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Http\Request;
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

$router->post('/api/chamados', function (Request $request) {
    return response()->json(Chamado::create($request->all()), 201);
});