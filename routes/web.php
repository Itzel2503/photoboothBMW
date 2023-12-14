<?php

use App\Http\Controllers\Collection;
use App\Http\Controllers\Collection2;
use App\Http\Controllers\Photos;
use App\Http\Controllers\Search;
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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/save-photos', [Photos::class, 'store']);

Route::get('/photos', function () {
    return view('photos');
});

Route::resource('/search', Search::class);
Route::resource('/collection', Collection::class);
Route::resource('/collection2', Collection2::class);