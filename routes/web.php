<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'user'],function()
{
    Route::group(['prefix'=>'auth'],function()
    {
        Route::get('/sign-up','UserAuthController@signUpPage');
        Route::post('/sign-up','UserAuthController@signUpProcess');

        Route::get('/sign-in','UserAuthController@signInPage')->name('SignPage');
        Route::post('/sign-in2','UserAuthController@signInProcess');
        Route::get('/sign-out','UserAuthController@signInOut');
    });
});
Route::group(['prefix'=>'user'],function()
{
    Route::get('/','MerchandiseController@merchandiseListPage');
    Route::get('/create','MerchandiseController@merchandiseCreateProcess');
    Route::get('/create','MerchandiseController@merchandiseManageListPage');

});
