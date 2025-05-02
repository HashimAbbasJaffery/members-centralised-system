<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Introletter;
use App\Models\Spouse;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class IntroletterController extends Controller
{
    public function __construct(protected ApiResponse $apiResponse) {}

    public function index() {
        $keyword = request()->keyword;
        $per_page = request()->per_page ?? 10;
        
        $introletters = Introletter::likeWhereOnAllColumns($keyword)
                            ->orderBy("id", "desc")
                            ->paginate($per_page)
                            ->onEachSide(1)
                            ->withQueryString();
        
        return $introletters->toResourceCollection();
    }
    public function store() {
        $spouses = request()->spouses;
        $children = request()->children;

        DB::transaction(function() use ($spouses, $children) {

            $introletter = Introletter::create([
                "member_id" => request()->member_id,
                "file_number" => request()->file_number,
                "date_of_applying" => request()->date_of_applying,
                "martial_status" => request()->marital_status,
                "city_country" => request()->city_country,
                "membership_status" => request()->membership_status
            ]);
    
            // Adding Spouses
            foreach($spouses as $spouse) {
                Spouse::create([
                    "spouse_name" => $spouse,
                    "member_id" => request()->member_id
                ]);
            }
    
            // Adding children
            foreach($children as $child) {
                Child::create([
                    "child_name" => $child[0],
                    "date_of_birth" => $child[1],
                    "member_id" => request()->member_id
                ]);
            }

        });

        return $this->apiResponse->success("Introletter Created successfully!");
    }
    public function destroy(Introletter $introletter) {
        if(!$introletter->exists()) {
            throw new ModelNotFoundException("Model Not Found");
        }
        
        $introletter->delete();
        $this->apiResponse->success("Data has been deleted");
    }
}
