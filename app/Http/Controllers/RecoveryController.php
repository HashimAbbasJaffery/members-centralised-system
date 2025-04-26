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

    public function create() {
        return view("recovery.member.create");
    }
    public function update(Recovery $recovery) {
        return view("recovery.member.update", compact("recovery"));
    }
}
