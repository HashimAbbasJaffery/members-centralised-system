<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MembersController extends Controller
{
    protected MemberResource $membersResource;
    public function __construct(protected ApiResponse $apiResponse) {

    }
    public function index() {
        $keyword = request()->keyword;
        $per_page = request()->per_page ?? 10;
        $relationships = [ "recovery", "introletter" ];
        
        $members = Member::likeWhereOnAllColumns($keyword)
                            ->filter([ "type" => request()->type, "whereHasTable" => $relationships ])
                            ->orderBy("id", "desc")
                            ->paginate($per_page)
                            ->onEachSide(1)
                            ->withQueryString();
        
        return $members->toResourceCollection();
    }

    public function destroy(Member $member) {
        $member->delete();
        return [ "status" => 200 ];
    }
    public function highlight(Member $member) {
        $member->toggleHighlight();
        return [ "status" => 200 ];
    }
    public function updateMembershipNumber(Member $member) {
        $membership_id = request()->membership_id;
        $membership_number = request()->membership_number;

        $member->update([
            "membership_id" => $membership_id,
            "membership_number" => $membership_number
        ]);

        return $this->apiResponse->success("Membership details has been updated!");
    }
}
