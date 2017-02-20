<?php

namespace App\API1\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\API1\Requests\ProfileUpdateRequest;
use App\User;
use Response;

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
	//
    }

    /**
     * Update user profile in storage.
     *
     * @param  App\API1\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request) {

	$password = $request->request->get('password');

	$user = User::find($request->request->getInt('id'));

	$user->name = $request->request->get('name');
	$user->email = $request->request->get('email');

	if(!empty($password)){
	    $user->password = bcrypt($password);
	}
	$user->save();

        return Response::json(array('success' => true));
    }

}
