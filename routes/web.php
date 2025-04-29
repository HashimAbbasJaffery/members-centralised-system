<?php

use App\Http\Controllers\IntroletterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersBasicDetailsController;
use App\Http\Controllers\RecoveryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource("/members", MemberController::class);
Route::get("/member-details", [MembersBasicDetailsController::class, "get"])->name("api.member-details");
Route::get("/member-details/{member}/update", [MembersBasicDetailsController::class, "update"])->name("update.member-details");

// Route::get("/member/{member}/add_to_introletter", [IntroletterController::class, "create"]);

Route::get("/recovery", [RecoveryController::class, "index"])->name("member.add.recovery");
Route::get("/recovery/{member}/create", [RecoveryController::class, "create"])->name("member.create.recovery");
Route::get("/recovery/createManually", [RecoveryController::class, "createManually"])->name("member.create.recovery.manually");
Route::get("/recovery/{recovery}/update", [RecoveryController::class, "update"])->name("member.update.recovery");

