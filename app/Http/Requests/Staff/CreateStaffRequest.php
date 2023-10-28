<?php

namespace App\Http\Requests\Staff;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateStaffRequest extends FormRequest
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

    public function rules()
    {

        return [
            [
                'firstname' => 'string',
                'lastname' => 'string',
                'user_role_id' => 'integer|required|in:2,3,4',
                'group_id' => 'integer',
                'private_number' => 'string|required',
                'email' => 'string|required',
                'password' => 'string|required|min:8'
            ]
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()->messages()

        ], 401));

    }

    public function messages()
    {
        return [
            'private_number.required' => 'Private Number is required!'
        ];
    }
}
