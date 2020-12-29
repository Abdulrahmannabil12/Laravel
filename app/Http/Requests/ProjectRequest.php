<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
                'name'=>'required|string|max:20|min:5',
              ];
    }
    public function messages()
    {
        return [
            'required'=>'This Field is required',
            'max'=>'Name is too long ',
            "min"=>'Name is too short'
        ];
    }
}
