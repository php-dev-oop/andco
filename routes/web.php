<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\FactController;

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

require __DIR__ . '/auth.php';

Route::get('/pagenotfound', [DashboardController::class, 'pagenotfound'])->name('notfound');
Route::get('/internalerror', [DashboardController::class, 'internalerror'])->name('internalerror');

//Login
Route::get('/', [DashboardController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Role
    Route::name('role.')->group(function () {
        Route::get('/role/manage', [RoleController::class, 'index'])->name('manage');
        Route::post('/role/store', [RoleController::class, 'store'])->name('store');
        Route::post('/role/update', [RoleController::class, 'update'])->name('update');
        Route::get('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('destroy');

        Route::get('/role/haspermission/{id}', [RoleController::class, 'haspermission'])->name('haspermission');
    });

    //Permission
    Route::name('permission.')->group(function () {
        Route::get('/permission/manage', [PermissionController::class, 'index'])->name('manage');
        Route::post('/permission/store', [PermissionController::class, 'store'])->name('store');
        Route::post('/permission/update', [PermissionController::class, 'update'])->name('update');
        Route::get('/permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('destroy');
    });

    //User
    Route::name('user.')->group(function () {
        Route::get('/user/manage', [UserController::class, 'index'])->name('manage');
        Route::post('/user/store', [UserController::class, 'store'])->name('store');
        Route::post('/user/update', [UserController::class, 'update'])->name('update');
        Route::post('/user/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');

        Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/user/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::get('/user/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
        Route::post('/user/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
    });

    //Facts
    Route::name('fact.')->group(function () {
        Route::get('/fact/manage', [FactController::class, 'index'])->name('manage');
        Route::post('/fact/store', [FactController::class, 'store'])->name('store');
        Route::post('/fact/update', [FactController::class, 'update'])->name('update');
        Route::get('/fact/destroy/{id}', [FactController::class, 'destroy'])->name('destroy');
    });

    //Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    //Groups
    Route::get('/groups', [GroupController::class, 'index'])->name('groups');
    Route::get('/groupinvitations/{id}', [GroupController::class, 'groupinvitations'])->name('groupinvitations');
    //magazines
    Route::get('/magazines', [MagazineController::class, 'index'])->name('magazines');
});
