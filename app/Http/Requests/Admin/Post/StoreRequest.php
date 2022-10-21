<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field is required',
            'title.string' => 'This field must be a string',
            'content.required' => 'This field is required',
            'preview_image.required' => 'This field is required',
            'preview_image.file' => 'This field must be a file',
            'main_image.required' => 'This field is required',
            'main_image.file' => 'This field must be a file',
            'category_id.required' => 'This field is required',
            'category_id.exists' => 'The category must be situated in database',
            'tag_ids.exists' => 'The tag(s) must be situated in database',
        ];
    }
}
