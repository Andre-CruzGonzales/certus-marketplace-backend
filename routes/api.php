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


Route::group(['middleware' => ['jwt.verify','cors']], function() {
       /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
       Route::get('products/get','ProductoController@get');
       Route::get('products/get/{id}','ProductoController@getID');
 });
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
