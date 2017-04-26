<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Admin\Requests\UserUpdateRequest;
use \Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getIndex()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function getEdit($id)
    {
        $user = User::find($id);


        return view('admin.users.edit', compact('user'));
    }

    public function postUpdate(Request $request, $userId)
    {
        $rules = array (
            'name' => 'required|min:1|max:50',
            'email' => 'required|email',
        );

        $rules_messages = array(
            "name.required" => 'Name field is required.',
            "email" => 'Email field is required.',
        );

        $validator = Validator::make($request->all(), $rules, $rules_messages);

        if ($validator->fails()) {

            $errors = $validator->getMessageBag();

            return \Redirect::back()->withInput()->withErrors($errors);
        } else {
            $user = User::find($userId);

            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $user->save();

            return \Redirect::route('users.edit', [$userId]);
        }
    }
}