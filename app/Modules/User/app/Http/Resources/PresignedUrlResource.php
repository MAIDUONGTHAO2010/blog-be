<?php

namespace Modules\User\App\Http\Resources;

use App\Http\Resources\BaseResource;

class PresignedUrlResource extends BaseResource
{
    public function generate()
    {
        return [
            'action' => config('presigned_url.endpoint'),
            'method' => 'POST',
            'header' => [],
            'form_data' => $this->resource,
            'file_path' => $this->resource['key'],
            'file_url' => file_url($this->resource['key']),
        ];
    }
}
