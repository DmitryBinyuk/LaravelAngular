<?php

namespace App\Api1\Requests;

use App\Models\Comment;
use App\Http\Requests\Request;

class ProfileUpdateRequest extends Request
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
            'name' => 'required|string',
            'email' => 'required|email',
	    'password' => 'sometimes|required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field is required',
            'email.required' => 'Field is required',
        ];
    }
}
