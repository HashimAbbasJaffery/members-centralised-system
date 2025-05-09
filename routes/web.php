<?php

use App\Http\Controllers\IntroletterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersBasicDetailsController;
use App\Http\Controllers\MembershipController;
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

Route::get("/introletter/{member}/create", [IntroletterController::class, "create"])->name("introletter.create");
Route::get("/introletter/{introletter}/update", [IntroletterController::class, "update"])->name("member.introletter.update");
Route::get("/introletter", [IntroletterController::class, "index"])->name("introletter.index");
Route::get("/introletter/createManually", [IntroletterController::class, "createManually"])->name("member.create.manually");

Route::resource("/membership", MembershipController::class);
Route::get("/membership", [MembershipController::class, "index"])->name("membership.index");
// Route::resource("/introletter", IntroletterController::class);

