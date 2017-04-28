<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
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
        $rememberMe = (Input::has('remember_me')) ? true : false;

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $rememberMe))
        {
            $u = Auth::user();
            return \Redirect::route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function postRegistration(Request $request)
    {
        $rules = array(
            'name' => 'required|min:1|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
        );

        $rules_messages = array(
            "name.required" => 'Name field is required.',
            "email" => 'Email field is required.',
            "password" => 'Password field is required.',
        );

        $validator = Validator::make($request->all(), $rules, $rules_messages);

        if ($validator->fails()) {

            $errors = $validator->getMessageBag();

            return \Redirect::back()->withInput()->withErrors($errors);
        } else {

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $password=Hash::make($request->input('password'));
            $user->password = $password;

            $user->save();

            return \Redirect::route('phones.list');
        }
    }
}