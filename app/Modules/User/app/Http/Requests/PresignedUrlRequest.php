<?php

namespace Modules\User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PresignedUrlRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validResources = array_keys(config('presigned_url.resources'));
        $validContentType = config('presigned_url.resources.'.$this->input('resource').'.allow_mime_types');

        return [
            'resource' => [
                'required',
                Rule::in($validResources),
            ],
            'file_name' => 'required',
            'content_type' => [
                'required',
                Rule::in($validContentType),
            ],
        ];
    }
}
