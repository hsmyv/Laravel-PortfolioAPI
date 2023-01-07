<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Education extends FormRequest
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
            'school'                   => 'required',
            'degree'                   => 'required',
            'fieldofstudy'             => 'required',
            'start_date'               => 'required',
            'end_date'                 => 'required',
            'grade'                    => 'required',
            'activities_and_socities'  => 'required',
            'description'              => 'required',
        ];
    }
}
