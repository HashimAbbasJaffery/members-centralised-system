<?php

use App\Http\Controllers\Api\MembersController;
use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name("api.")->group(function() {
    Route::resource("/members", MembersController::class);
});

Route::put("/member/{member}/highlighter", [MembersController::class, "highlight"])->name("api.members.highlight");
