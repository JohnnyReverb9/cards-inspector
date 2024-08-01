<?php

use App\Http\Controllers\ControllerCardManagement;
use App\Http\Controllers\ControllerMainPage;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function ()
{
    // Route::get("/", [ControllerMainPage::class, "index"]);
    Route::get("/home", [ControllerMainPage::class, "index"]);

    Route::get("/create_card", [ControllerCardManagement::class, "createCardPage"]);
    Route::post("/create_card", [ControllerCardManagement::class, "createCard"]);

    Route::get("/view_cards", [ControllerCardManagement::class, "viewCards"]);
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
