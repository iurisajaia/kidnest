<?php

namespace App\Http\Requests\Activity;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateActivityNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            [
                'activity_id' => 'integer|required',
//                'activity_category_id' => 'integer|required',
                'group_id' => 'integer|required',
                'parent_id' => 'required|array',
                'parent_id.*' => 'integer',
                'staff_id' => 'integer|required'
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
            'activity_id.required' => 'Activity is required!',
//            'activity_category_id.required' => 'Activity Category is required!',
            'group_id.required' => 'Group is required',
            'parent_id.required' => 'Parent is required',
            'staff_id.required' => 'Staff is required'
        ];
    }
}
