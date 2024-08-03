<?php

use App\Http\Controllers\ControllerCardManagement;
use App\Http\Controllers\ControllerMainPage;
use App\Http\Controllers\ControllerProfile;
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
    Route::get("/home", [ControllerMainPage::class, "index"])->name("home");

    Route::get("/create_card", [ControllerCardManagement::class, "createCardPage"])->name("create_card");
    Route::post("/create_card", [ControllerCardManagement::class, "createCard"])->name("create_card_post");

    Route::get("/view_cards", [ControllerCardManagement::class, "viewCardList"])->name("view_cards");
    Route::get("/view_card/{id}", [ControllerCardManagement::class, "viewCard"])->name("view_card");

    Route::get("/profile", [ControllerProfile::class, "index"])->name("profile");
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
