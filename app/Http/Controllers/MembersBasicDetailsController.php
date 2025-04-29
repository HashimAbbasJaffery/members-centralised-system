<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $data = [
            "name" => request()->name,
            "email" => request()->email,
            "gender" => request()->gender,
            "dob" => request()->dob,
            "passport" => request()->passport,
            "membership_id" => request()->membership_id  
        ];

        $validator = Validator::make($data, [
            "name" => [ "required" ],
            "email" => [ "required" ],
            "gender" => [ "required" ],
            "dob" => [ "required" ],
            "passport" => [ "required" ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $member->update($validator->validated());
        
        return $this->apiResponse->success("Data has been updated!");
    }
    public function store() {
        $member = Member::create([
            "name" => request()->name,
            "email" => request()->email,
            "gender" => request()->gender,
            "dob" => request()->dob,
            "passport" => request()->passport,
            "membership_id" => request()->membership_id,
            "cnic" => "",
            "adress" => "",
            "city" => "",
            "mobile" => "",
            "profession" => "",
            "position" => "",
            "organization" => "",
            "income" => "",
            "seeking" => "",
            "current" => now(),
            "unique_key" => "",
            "status" => "",
            "highlighted" => ""
        ]);

        return $this->apiResponse->success("Member has been created", [ "id" => $member->id ]);
    }
}
