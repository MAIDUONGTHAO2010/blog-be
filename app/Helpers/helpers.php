<?php

if (! function_exists('file_url')) {
    function file_url(?string $path, $default = null)
    {
        if (! strlen($path)) {
            return $default;
        }

        $url = rtrim(config('common.file_url'), '/');
        $path = trim($path, '/');

        return implode('/', [$url, $path]);
    }
}
