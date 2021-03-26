<?php

use App\Http\Controllers\VideoController;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::impersonate();

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/video/{id?}', function (int $id = 0) {
    return Auth::user()->can('view all videos') ? view('video', ['video' => Video::find($id)]) : redirect('/dashboard');
})->name('dashboard-video');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/my-video', function () {
    return Auth::user()->can('manage own videos') ? view('my-video') : redirect('/dashboard');
})->name('dashboard-own-video');
