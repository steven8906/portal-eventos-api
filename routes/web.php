<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return redirect('/api');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return response()->json($router->app->version());
    });
    $router->get('events', 'EventController@all');
    $router->get('guests', 'EventController@guests');
    $router->post('confirm-invitation', 'EventController@confirmInvitation');
    $router->post('confirm', 'EventController@confirm');
});
