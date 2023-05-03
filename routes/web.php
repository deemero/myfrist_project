<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderDetailController;


// use App\Http\Controlllers\Auth\{
//     LoginController,
//     RegisterController,
// };
// use App\Http\Controllers\{
//     OrderDetailController,
// };

// DB::listen(function ($event){
//     dump($event->sql);
// });


Route::controller(LoginController::class)
    ->group(function(){
        Route::get('/login','index')->name('login');
        Route::post('/login','store');
        Route::post('/logout','logout')->name('logout');
    });


Route::controller(RegisterController::class)
 ->group(function(){
    Route::get('register' , 'index')->name('register');
    Route::post('/register', 'store');
});

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(OrderDetailController::class)
    ->group(function(){
        Route::get('/order-details','index')->name('order.index');
        Route::get('/new-order', 'create')->name('order.create');
        Route::post('/new-order' ,'store');
        Route::get('/edit-order/{id}', 'edit')->name('order.edit');
        Route::patch('/edit-order/{id}/update',  'update')->name('order.update');
        Route::delete('/delete-order/{id}/delete',  'delete')->name('order.delete');
    });
