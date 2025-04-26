<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersBasicDetailsController extends Controller
{
    public function get() {
        return view("member-details.members");
    }
}
