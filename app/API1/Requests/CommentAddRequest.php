<?php

namespace App\Api1\Requests;

use App\Models\Comment;
use App\Http\Requests\Request;

class CommentAddRequest extends Request
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
//            'text' => 'required|string',
//            'phone_id' => 'required|integer|exists:phones,id',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Field is required',
            'text.required' => 'Field is required',
        ];
    }
}
