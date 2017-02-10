<?php

namespace App\Api1\Requests;

use App\Models\Comment;
use App\Http\Requests\Request;

class FeedbackCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'author' => 'required|string',
//            'email' => 'required|email',
//            'message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Author is required',
            'email.required' => 'Email is required',
	    'message.required' => 'Feedback message is required',
        ];
    }
}
