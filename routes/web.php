<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\PublicController;

// waiter route
Route::get('/', [OrderController::class, 'index'])->name('order.form');
Route::post('order_submit', [OrderController::class, 'submit'])->name('order.submit');

// kitchen route
Route::resource('/dish', DishesController::class);
// order panal
Route::get('order', [DishesController::class,'order'])->name('kitchen.order');
// order status
Route::get('order/{order}/approve', [DishesController::class,'approve']);
Route::get('order/{order}/cancel', [DishesController::class,'cancel']);
Route::get('order/{order}/ready', [DishesController::class,'ready']);

Route::get('order/{order}/serve', [OrderController::class,'serve']);

// frontend route
Route::get('/index', [PublicController::class,'index']);


// laravel ui authentication control route
Auth::routes([
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);
