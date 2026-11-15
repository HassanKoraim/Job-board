<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "bail|required|string|max:255|unique:post,title,{$this->input('id')}",
            'body' => 'bail|required|string',
        ];
    }
 
    public function messages()
    {
        return [
            'title.required' => 'mandatory field.',
            'body.required' => 'mandatory field.',
        ];
    }
}
