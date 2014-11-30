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



$router->group(['prefix' => 'api/v1'], function($router)
{

	$router->get('movies/{id}/sessions', ['as' => 'api.v1.movies.sessions', 'uses' => 'MoviesController@sessions']);
	$router->get('cinemas/{id}/sessions', ['as' => 'api.v1.cinemas.sessions', 'uses' => 'CinemasController@sessions']);

	$router->resource('cinemas', 'CinemasController', [
		'except' => ['create','edit','update']
	]);

	$router->resource('movies', 'MoviesController', [
		'except' => ['create','edit','update']
	]);

	$router->resource('sessions', 'SessionTimesController', [
		'only' =>  'index'
	]);

});



