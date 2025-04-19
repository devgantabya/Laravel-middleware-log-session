<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function members(Request $request) {
        return "We're members now";
    }

    public function member(Request $request) {
        return "You're member now";
    }

    public function memberId($id) {
        return "Your member ID number:{$id}";
    }


    public function throttleTest(Request $request) {
        return "You will get 2 requests per minute";
    }

}
