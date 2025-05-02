<?php

namespace App\Http\Controllers;

use App\Models\Introletter;
use App\Models\Member;
use Illuminate\Http\Request;

class IntroletterController extends Controller
{
    public function index() {
        return view("introletter.members");
    }
    public function create(Member $member) {
        return view("introletter.create", compact("member"));
    }
    public function store() {

    }
    public function update(Introletter $introletter) {
        return view("introletter.update", compact("introletter"));
    }
}
