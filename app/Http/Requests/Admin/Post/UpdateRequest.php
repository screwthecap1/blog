<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field is required for filling',
            'title.string' => 'Data must be associate with string type',
            'content.required' => 'This field is required for filling',
            'content.string' => 'Data must be associate with string type',
            'preview_image.required' => 'This field is required for filling',
            'preview_image.file' => 'Data must be associate with file type',
            'main_image.required' => 'This field is required for filling',
            'main_image.file' => 'Data must be associate with file type',
            'category_id.required' => 'This field is required for filling',
            'category_id.string' => 'Id of Category must be integer type',
            'category_id.exists' => 'Id of Category must be in DB',
            'tag_ids.array' => 'It should be send as data array',
        ];
    }
}
