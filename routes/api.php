<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::post('register','AuthController@register');
    Route::post('login','AuthController@authenticate');
    Route::get('users/get','UserController@get');
    /** categoria */
    Route::get('categoria/get','CategoriaController@get');
    Route::post('categoria/create','CategoriaController@create');
    Route::post('categoria/update/{idCategoria}','CategoriaController@update');
    Route::delete('categoria/delete/{idCategoria}','CategoriaController@delete');
    Route::get('categoria/get/{idCategoria}','CategoriaController@getId');
    /** producto*/
    Route::post('products/create','ProductoController@create');
    Route::post('products/update/{idProducto}','ProductoController@update');
    Route::delete('products/delete/{idProducto}','ProductoController@delete');
    Route::get('products/get','ProductoController@get');
       Route::get('products/get/{id}','ProductoController@getID');
       Route::put('products/publicar/{id}','ProductoController@publicar');
       Route::get('products/get_publicados','ProductoController@getPublicados');

Route::group(['middleware' => ['jwt.verify','cors']], function() {
       /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/

 });
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
