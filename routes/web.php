<?php

use App\Http\Controllers\ControllerCardManagement;
use App\Http\Controllers\ControllerMainPage;
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

Route::get("/", [ControllerMainPage::class, "index"]);
Route::get("/create_card", [ControllerCardManagement::class, "createCardPage"]);
Route::post("/create_card", [ControllerCardManagement::class, "createCard"]);
