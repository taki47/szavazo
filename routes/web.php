<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, "index"])->name("login");
Route::post('/', [PublicController::class, "sendEmail"])->name("sendEmail");

Route::middleware('auth')->group(function () {
    Route::get("/vote", [PublicController::class, "vote"])->name("vote");
    Route::post("/vote", [PublicController::class, "sendVote"])->name("sendVote");
});
