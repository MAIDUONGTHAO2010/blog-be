<?php

namespace App\Services;

use App\Traits\ManagementS3File;
use Aws\S3\PostObjectV4;
use Illuminate\Support\Facades\Storage;

class PresignedUrlService
{
    use ManagementS3File;

    protected $expire;

    protected $resourcesConfig;

    public function __construct($configs = null)
    {
        $configs = $configs ?? config('presigned_url');

        $this->expire = $configs['expire'];
        $this->resourcesConfig = $configs['resources'];
    }

    public function generatePresignedPost($resource, $fileName, $contentType)
    {
        $config = $this->resourcesConfig[$resource];

        $client = Storage::disk('s3')->getClient();

        $bucket = config('filesystems.disks.s3.bucket');

        $filePath = $this->generateS3FilePath($fileName, $resource);

        $formInputs = [
            'key' => $filePath,
            'Content-Type' => $contentType,
        ];

        $postPolicies = [
            ['bucket' => $bucket],
            ['eq', '$key', $filePath],
            ['eq', '$Content-Type', $contentType],
            ['content-length-range', 0, $config['max_size']],
        ];

        $expires = $this->generateExpire();

        $postObject = new PostObjectV4(
            $client,
            $bucket,
            $formInputs,
            $postPolicies,
            $expires
        );

        return $postObject->getFormInputs();
    }

    protected function generateExpire()
    {
        return '+'.$this->expire.' seconds';
    }
}
