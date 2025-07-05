<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait ManagementS3File
{
    public function uploadFileToS3($files, $dir)
    {
        $result = [];

        try {
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $dir.'/'.uniqid().'-'.$fileName;

                $path = Storage::disk('s3')->put($filePath, $this->getFileContents($file));
                $path = Storage::disk('s3')->url($path);

                $result[] = [
                    'name' => $fileName,
                    'path' => $filePath,
                ];
            }
        } catch (\Exception $e) {
            Log::error($e);
        }

        return $result;
    }

    public function deleteFilesFromS3($pathFiles)
    {
        try {
            foreach ($pathFiles as $file) {
                if (Storage::disk('s3')->exists($file)) {
                    Storage::disk('s3')->delete($file);
                }
            }
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function getFileContents($file)
    {
        return file_get_contents($file);
    }

    public function getS3Url($filePath)
    {
        if (Storage::disk('s3')->exists($filePath)) {
            return Storage::disk('s3')->url($filePath);
        }

        return null;
    }

    public function getS3TemporaryUrl($filePath, $expiredMinutes = 5)
    {
        if (Storage::disk('s3')->exists($filePath)) {
            return Storage::disk('s3')->temporaryUrl($filePath, now()->addMinutes($expiredMinutes));
        }

        return null;
    }

    public function putS3($filePath, $content)
    {
        return Storage::disk('s3')->put($filePath, $content);
    }

    public function putS3FromUrl($filePath, $url)
    {
        return Storage::disk('s3')->put($filePath, $this->getFileContents($url));
    }

    public function generateS3FilePath($fileName, $resource)
    {
        $fileName = $this->sanitizeS3FileName($fileName);
        $subFolder = $this->generateS3Subfolder();

        return implode('/', [$resource, $subFolder, $fileName]);
    }

    public function sanitizeS3FileName($fileName)
    {
        return preg_replace(config('common.s3_resources.safe_file_name_regex'), '', $fileName);
    }

    public function generateS3Subfolder()
    {
        return bin2hex(random_bytes(config('common.s3_resources.subfolder_length_bytes')));
    }

    public function deleteDirectory($directory)
    {
        return Storage::disk('s3')->deleteDirectory($directory);
    }
}
