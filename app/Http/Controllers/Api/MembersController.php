<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MembersController extends Controller
{
    protected MemberResource $membersResource;
    public function __construct() {

    }
    public function index() {
        $keyword = request()->keyword;
        $per_page = request()->per_page ?? 10;
        $members = Member::likeWhereOnAllColumns($keyword)
                            ->orderBy("id", "desc")->paginate($per_page)
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
}
