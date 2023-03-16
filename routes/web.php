<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MediasAccessController;

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

Route::get('/', function () {
    return redirect()->route('albums.index');
});

Route::get('/file/medias/{album}/{media}', [MediasAccessController::class, 'serve']);

Route::resource('albums', AlbumController::class)->only(['index', 'show']);
