<?php

return [
    'file_url' => env('FILE_URL', 'https://your-default-url.com'),
    's3_resources' => [
        'subfolder_length_bytes' => 12,
        'safe_file_name_regex' => '/[^0-9a-zA-Z\!\-\_\.\*\'\(\)]/i',
    ],
];
