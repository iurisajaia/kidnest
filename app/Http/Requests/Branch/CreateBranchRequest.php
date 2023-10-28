<?php

namespace App\Http\Requests\Branch;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateBranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            [
                'kids_count' => 'numeric|min:4',
                'title' => 'string'
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
