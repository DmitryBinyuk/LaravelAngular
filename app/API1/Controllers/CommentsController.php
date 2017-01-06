<?php

namespace App\API1\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Phone;
use App\Http\Transformers\PhoneTransformer;
use App\Http\Transformers\CommentTransformer;
use App\API1\Requests\CommentAddRequest;
use Response;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($phoneId)
    {
	$comments = Comment::where('phone_id', $phoneId)->get();

        $data = fractal()
	    ->collection($comments)
	    ->transformWith(new CommentTransformer())
	    ->toArray();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentAddRequest $request)
    {
	$phone = Phone::find($request->request->getInt('phone_id'));

	$comment = new Comment;
	$comment->author = $request->request->get('author');
	$comment->text = $request->request->get('text');
	$comment->phone()->associate($phone);
	$comment->save();

        return Response::json(array('success' => true));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return Response::json(array('success' => true));
    }
}
