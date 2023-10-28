<?php

namespace App\Http\Requests\Kid;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateKidRequest extends FormRequest
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
                'first_name' => 'string',
                'last_name' => 'string',
                'private_number' => 'required|string',
                'group_id' => 'integer',
                'branch_id' => 'integer',
//                'registration_date' => 'string'
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
}
