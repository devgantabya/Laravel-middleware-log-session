<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function demo1(Request $request) {
        $request->session()->put('user_email', 'developergantabya@gmail.com');
        return 'Session data stored successfully';
    }

    public function demo2(Request $request) {
        $email = $request->session()->get('user_email', 'No email found');
        return "Retrieved email: $email";
    }

    public function demo3(Request $request) {
        $request->session()->flush();
        return 'Session data flushed successfully';
    }

    public function demo4(Request $request) {
        $email = $request->session()->pull('user_email', 'No email found');
        return "Pulled email: $email";
    }
}

