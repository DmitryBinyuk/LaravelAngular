<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Validator;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember_me')))
        {
            return \Redirect::route('admin/dashboard');
        }

        return view('admin.login');
    }
}