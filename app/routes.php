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

/*
| / && /home            -> Home do site
| /admin/*              -> sessoes de administração do site
| /admin/index          -> local padrão de carregamento pos login
| /admin/frotas         -> pagina de alteração da frota
| /admin/frotas/novo    -> form de criacao de nova frota
| /admin/frotas/editar  -> form de alteração
| /admin/frotas/
*/


Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', ['as' => 'login', 'uses' => 'UserController@getLogin']);

Route::group(array('before' => 'auth'), function() {
    //Route::controller('admin', 'AdminController');
	Route::get('admin', array('as' => 'admin', 'uses' => 'AdminController@getIndex'));
	Route::get('admin/content/create', array('as' => 'create', 'uses' => 'AdminController@create'));
	Route::post('admin/content/store', array('as' => 'store', 'uses' => 'AdminController@store'));
});

Route::controller('user', 'UserController', array(
    'postAuth' => 'user.auth'
));

//Route::get('login', array('as' => 'login', 'uses' => 'AdminController@getLogin'));


App::missing(function($exception)
{
    return Response::view('errors.not-found', array(), 404);
});
