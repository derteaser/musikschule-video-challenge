<?php

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
    return view('home');
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/user/{user}', function (User $user) {
    return Auth::user()->hasAnyRole(['Admin', 'Superadmin']) ? view('user', ['user' => $user]) : redirect('/dashboard');
})->name('dashboard-user');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/draw', function () {
    return Auth::user()->can('draw winners') ? view('draw') : redirect('/dashboard');
})->name('dashboard-draw');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/permission', function () {
    return Auth::user()->hasRole('Superadmin') ? view('permission') : redirect('/dashboard');
})->name('dashboard-permission');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/role/{role?}', function (?Role $role = null) {
    return Auth::user()->hasRole('Superadmin') ? view('role', ['role' => $role]) : redirect('/dashboard');
})->name('dashboard-role');
