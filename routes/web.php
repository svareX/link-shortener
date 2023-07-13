<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LinkController::class, 'create']);

Route::resource('/links', LinkController::class)->only([
    'create', 'store', 'show'
]);
Route::get('/{url_short}', [LinkController::class, 'show'])->name('links.show');
