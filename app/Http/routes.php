<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$router->get('/', function(){ 
	return 'home';
});





$router->get('cinemas/{id}/sessions', 'CinemasController@sessions');
$router->get('movies/{id}/sessions', 'MoviesController@sessions');

$router->resource('cinemas', 'CinemasController', [
	'except' => ['create','edit'],
]);

$router->resource('movies', 'MoviesController', [
	'only' => ['index','show'],
]);

$router->resource('sessions', 'SessionTimesController', [
	'only' => ['index','show'],
]);


