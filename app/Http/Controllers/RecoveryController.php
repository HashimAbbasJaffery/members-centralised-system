<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Recovery;
use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    public function index() {
        return view("recovery.members");
    }

    public function create(Member $member) {
        $member_name = ($member->only("name"))["name"];
        return view("recovery.member.create", compact("member_name"));
    }
    public function update(Recovery $recovery) {
        $member = $recovery->member()->select(["id", "name", "gender", "dob", "passport", "email", "membership_id"])->first();
        return view("recovery.member.update", compact("recovery", "member"));
    }
    public function createManually(Member $member) {
        return view("recovery.create-manually");
    }
}
