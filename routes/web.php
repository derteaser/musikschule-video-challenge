<?php

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
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

Route::impersonate();

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/video/{id?}', function (int $id = 0) {
    return Auth::user()->can('view videos') ? view('video', ['video' => Video::find($id)]) : redirect('/dashboard');
})->name('dashboard-video');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/my-video', function () {
    return Auth::user()->can('manage my video') ? view('my-video') : redirect('/dashboard');
})->name('dashboard-own-video');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/attendants', function () {
    return Auth::user()->hasAnyRole(['Admin', 'Superadmin']) ? view('attendants') : redirect('/dashboard');
})->name('dashboard-attendants');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/draw', function () {
    return Auth::user()->can('draw winners') ? view('draw') : redirect('/dashboard');
})->name('dashboard-draw');
