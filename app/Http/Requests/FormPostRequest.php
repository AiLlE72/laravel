<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class FormPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {

        return [
            'title' => [ 'required', 'min:8', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'slug' => ['required', 'regex:/^[a-z0-9\-]+$/', 'min:8', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'content' => ['required'],
            'category_id'=>['required', 'exists:categories,id'],
            'tags'=> ['array', 'exists:tags,id', 'required'],
            'image'=>['image', 'max:2000']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}
