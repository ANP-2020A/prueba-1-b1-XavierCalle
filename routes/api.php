<?php

use Illuminate\Http\Request;

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
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('products', 'ProductsController@index');
Route::get('products/{product}', 'ProductsController@show');





Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');

    Route::post('products', 'ProductsController@store');
    Route::put('products/{product}', 'ProductsController@update');
    Route::delete('products/{product}', 'ProductsController@delete');

    Route::get('customers', 'CustomersController@index');
    Route::get('customers/{customer}', 'CustomersController@show');
    Route::post('customers', 'CustomersController@store');
    Route::put('customers/{customer}', 'CustomersController@update');
    Route::delete('customers/{customer}', 'CustomersController@delete');

 });






