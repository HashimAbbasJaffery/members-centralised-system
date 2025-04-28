<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembersBasicDetailsController extends Controller
{
    public function __construct(protected ApiResponse $apiResponse) {}
    public function get() {
        return view("member-details.members");
    }
    public function update(Member $member) {
        $memberships = Membership::get();
        return view("member-details.update", compact("member", "memberships"));
    }

    public function edit(Member $member) {
        $member->update([
            "name" => request()->name,
            "email" => request()->email,
            "gender" => request()->gender,
            "dob" => request()->dob,
            "passport" => request()->passport,
            "membership_id" => request()->membership_id  
        ]);

        return $this->apiResponse->success("Data has been updated!");
    }
}
