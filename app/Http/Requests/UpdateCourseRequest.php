<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                // "unique:courses,name,{$id},id"
                Rule::unique('courses')->ignore($this->course)
            ],
            'image' => [
                'nullable',
                'image',
                'max:1024' // MB
            ],
            'description' => [
                'nullable',
                'min:3',
                'max:9999'
            ],
            'available' => [
                'nullable',
                'boolean'
            ]
        ];
    }
}
