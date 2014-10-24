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

Route::get('/', function()
{
	return View::make('index');
});




Route::get('/lorem-ipsum', function()
{
		
	return View::make('lorem-ipsum');
	
});


Route::get('/user-generator', function()
{
		
	return View::make('user-generator');
	
});




Route::get('/p2', function()
{
		
	return View::make('p2');

});
