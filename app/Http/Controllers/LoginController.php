<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function logout()
    {
        \Session::flush(); // remove all the session data
        \Auth::logout(); // logout user
        \Artisan::call('cache:clear');
        return redirect('/');
    }
}
