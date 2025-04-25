<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Recovery;
use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    public function index() {
        $keyword = request()->keyword;
        $per_page = request()->per_page ?? 10;
        $recoveries = Recovery::
                            likeWhereOnAllColumns($keyword)
                            ->with("member")
                            ->orderBy("id", "desc")->paginate($per_page)
                            ->onEachSide(1)
                            ->withQueryString();
        return $recoveries->toResourceCollection();
    }

    public function store(Member $member) {
        Recovery::create([
            "member_id" => request()->id,
            "alt_phone_number" => request()->phone_number,
            "level" => request()->level,
            "membership_type" => request()->membership_type,
            "membership_number" => request()->membership_number,
            "installment_months" => request()->installment_month,
            "file_number" => request()->file_number,
            "form_fee" => request()->form_fee,
            "processing_fee" => request()->processing_fee,
            "first_payment" => request()->first_payment,
            "total_installment" => request()->total_installment 
        ]);


        return [ "status" => 200 ];
    }
    public function destroy(Recovery $recovery) {
        if(!$recovery->exists()) {
            return [ "status" => 404, "This member's recovery is not found in our database" ];
        }
        $recovery->delete();

        return [ "status" => 200, "message" => "This member's recovery is deleted!" ];
    }
}
