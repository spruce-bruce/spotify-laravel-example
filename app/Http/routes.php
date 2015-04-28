<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::match(['GET', 'POST'], 'search', 'Album\AlbumController@search');
Route::get('album/{id}', 'Album\AlbumController@getAlbum');

/*
 * controllers() allows you to implicitly define routes for your controllers
 *   - getIndex()
 *   - postSomething()
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// http://laravel.com/docs/5.0/controllers#restful-resource-controllers
// php artisan make:controller RestAlbum
// Route::resource('rest-album', 'RestAlbum');
