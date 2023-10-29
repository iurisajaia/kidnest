<?php

namespace App\Http\Requests\Activity;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateActivityRequest extends FormRequest
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
                'title' => 'string|required',
                'description' => 'string|required',
                'group_id' => 'integer|required'
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
            'activities' => 'required',
            'activities.title.required' => 'Title is required!',
            'activities.description.required' => 'Description is required!',
            'group_id.required' => 'Group is required'
        ];
    }
}
