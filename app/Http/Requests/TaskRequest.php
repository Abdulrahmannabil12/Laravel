<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title'=>'required|string|max:20|min:3',
            'details'=>'required|string|max:100|min:5',
            'status'=>'required|min:0|max:100|integer'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'This Field is required',
            'title.max'=>'Name is too long ',
            "title.min"=>'Name is too short',
            'details.required'=>'This Field is required',
            'details.max'=>'Name is too long ',
            "details.min"=>'Name is too short',
            'status.required'=>'This Field is required',
            'status.max'=>'Max State is 100% ',
            "status.min"=>'State starts from 0%',
        ];
    }
}
