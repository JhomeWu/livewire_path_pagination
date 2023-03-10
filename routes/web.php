<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{pagination?}', function ($pagination = 'p-1') {
    return view('page', [
        'pagination' => $pagination,
    ]);
});

Route::get('/other/{pagination?}', function ($pagination = 'p-1') {
    return view('page', [
        'pagination' => $pagination,
    ]);
});
