<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class importRequest extends FormRequest
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

        return array([

            '*.0' => 'required',
            '1' => Rule::in(['required ']),
            '2' => Rule::in(['required ']),
            '3' => Rule::in(['required ']),
            '4' => Rule::in(['required ']),
            '5' => Rule::in(['required ']),
            '6' => Rule::in(['required ']),
            '7' => Rule::in(['required ']),
            '8' => Rule::in(['required ']),
            '9' =>Rule::in([ 'required ']),
        ]);

}

}
