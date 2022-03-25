<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\MagazineController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Public Routes
Route::post("/login", [AuthController::class, "login"]);

Route::post('/join/group', [AuthController::class, 'joinGroup']);



//Protected Routes
//Route::group(['middleware' => ['auth:sanctum']], function () {
Route::get("/group/all", [GroupController::class, "index"]);
Route::get("/group/get/{id}", [GroupController::class, "show"]);
Route::post("/group/store", [GroupController::class, "store"]);
Route::post("/group/update/{id}", [GroupController::class, "update"]);
Route::get("/group/delete/{id}", [GroupController::class, "destroy"]);
//});

Route::get("/post/all", [GroupController::class, "index"]);
Route::get("/post/get/{id}", [GroupController::class, "show"]);
Route::post("/post/store", [GroupController::class, "store"]);
Route::post("/post/update/{id}", [GroupController::class, "update"]);
Route::get("/post/delete/{id}", [GroupController::class, "destroy"]);

// Magazine Routes
Route::get("magazine/all", [MagazineController::class, "index"]);
Route::post("/magazine/store", [MagazineController::class, "store"]);
Route::get("/magazine/get/{id}", [MagazineController::class, "show"]);
Route::put("/magazine/update/{id}", [MagazineController::class, "update"]);
Route::get("/magazine/getmagazine/{id}", [MagazineController::class, "getmagazine"]);


