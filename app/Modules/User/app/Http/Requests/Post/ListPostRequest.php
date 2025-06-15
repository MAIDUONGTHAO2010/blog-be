<?php

namespace Modules\User\App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class ListPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'keyword' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:categories,id',
            'page' => 'nullable|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'keyword.string' => 'The keyword must be a string.',
            'keyword.max' => 'The keyword may not be greater than 255 characters.',
            'category_id.integer' => 'The category ID must be an integer.',
            'category_id.exists' => 'The selected category does not exist.',
        ];
    }
}
