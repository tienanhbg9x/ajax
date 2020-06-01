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

Route::get('channels', 'ChannelController@index')->name('channels.index');
Route::get('posts/create', 'PostController@create')->name('posts.create');


Route::get('/postcards',function () {
    $postcardService = new \App\PostcardSendingService('us', 4, 6);
    $postcardService->hello('hello TienAnh Hoang','tienanhbg9x@gmail.com');
});


Route::get('/facades', function () {
    \App\Postcard::hello('hello from facade','abc@123.com');
});

Route::get('/customers','CustomerController@index')->name('customers.index');
Route::get('/customer/{customerId}','CustomerController@show')->name('customers.show');
Route::get('/customer/{customerId}/update','CustomerController@update')->name('customers.update');
Route::get('/customer/{customerId}/delete','CustomerController@delete')->name('customers.update');

Route::get('lazy', function () {
//   $collection = \Illuminate\Support\Collection::times(1000000)->map(function ($number) {
//       return pow(2, $number);
//   })->all();
//   return 'done!';
    $collection = \Illuminate\Support\LazyCollection::times(1000000)
        ->map(function ($number) {
            return pow(2, $number);
        })
        ->all();

    \App\User::cursor();
    return 'done!';
});

Route::get('generator', function () {
    function happyFunction($number)
    {
        for ($i = 1;$i < $number; $i++) {
            yield $i;
        }

    }
    foreach (happyFunction(100000) as $number) {
        if($number % 1000 == 0) {
            dump('what do you like');
        }
    }
});
