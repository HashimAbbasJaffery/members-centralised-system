<?php

use App\Http\Controllers\Api\MembersController;
use App\Http\Controllers\Api\RecoveryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersBasicDetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name("api.")->group(function() {
    Route::resource("/members", MembersController::class);
    Route::resource("/recovery", RecoveryController::class);
    Route::put("/member-details/{member}/update", [MembersBasicDetailsController::class, "edit"])->name("member-details.update");
});

Route::put("/member/{member}/highlighter", [MembersController::class, "highlight"])->name("api.members.highlight");
