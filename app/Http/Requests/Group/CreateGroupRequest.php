<?php

namespace App\Http\Requests\Group;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            [
                'title' => 'string',
                'age_id' => 'integer',
                'branch_id' => 'integer'
            ]
        ];
    }

    public function failedValidation(Validator $validator)

    {

        return redirect()->back()
            ->withErrors($validator)
            ->withInput();

    }
}
