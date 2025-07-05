<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PresignedUrlService;
use Modules\User\App\Http\Requests\PresignedUrlRequest;
use Modules\User\App\Http\Resources\PresignedUrlResource;

class PresignedUrlController extends Controller
{
    public $presignedUrlService;

    public function __construct(PresignedUrlService $presignedUrlService)
    {
        $this->presignedUrlService = $presignedUrlService;
    }

    public function generate(PresignedUrlRequest $request)
    {
        $result = $this->presignedUrlService->generatePresignedPost(
            $request->resource,
            $request->file_name,
            $request->content_type
        );

        return new PresignedUrlResource($result, __FUNCTION__);
    }
}
