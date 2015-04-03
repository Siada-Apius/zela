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

Route::get('', 'IndexController@index', [
    'only' => 'index'
]);

Route::resource('articles', 'ArticlesController', [
    'except' =>  ['destroy'],
    'where' => 'uri', '[A-Za-z]+',
]);

Route::resource('tags', 'TagsController', [
    'where' => 'name', '[A-Za-z]+',
]);

Route::resource('users', 'UsersController', [
    'except' =>  ['create', 'store', 'destroy'],
    'where' => 'name', '[A-Za-z]+',
]);

Route::resource('comments', 'CommentsController', [
    'only' =>  ['store', 'create']
]);

Route::get('tutorial', function(){
    return redirect('articles/zend_framework_install');
});

Route::get('video', 'ArticlesController@video');
Route::get('about', 'ArticlesController@about');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
