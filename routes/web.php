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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pagination', 'PaginationController@index');
Route::get('/pagination/fetch_data', 'PaginationController@fetchData');

Route::get('payments', 'PayOrderController@store')->name('payments.store');

Route::get('/postcards',function () {
    $postcardService = new \App\PostcardSendingService('us', 4, 6);
    $postcardService->hello('hello TienAnh Hoang','tienanhbg9x@gmail.com');
});
