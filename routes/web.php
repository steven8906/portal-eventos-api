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
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

header('Access-Control-Allow-Origin: https://eventos.portalapp.com.py');
header('Access-Control-Allow-Methods: https://eventos.portalapp.com.py');
header('Access-Control-Allow-Headers: https://eventos.portalapp.com.py');

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
