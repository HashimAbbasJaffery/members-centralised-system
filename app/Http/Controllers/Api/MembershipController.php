<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MembershipResource;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index() {
        $keyword = request()->keyword;
        $per_page = request()->per_page ?? 10;
        
        $memberships = Membership::orderBy("id", "desc")
                            ->orWhereLike("membership", "%$keyword%")
                            ->paginate($per_page)
                            ->onEachSide(1)
                            ->withQueryString();
        
        return $memberships->toResourceCollection(MembershipResource::class);
    }
}
