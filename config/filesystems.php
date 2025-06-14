<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [


        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
            'report' => false,
        ],

        'private_docs' => [
            'driver' => 's3',
            'key' => env('PRIVATE_DOCS_ACCESS_KEY'),
            'secret' => env('PRIVATE_DOCS_SECRET'),
            'region' => env('PRIVATE_DOCS_REGION'),
            'bucket' => env('PRIVATE_DOCS_BUCKET'),
            'url' => env('PRIVATE_DOCS_URL'),
            'endpoint' => env('PRIVATE_DOCS_ENDPOINT'),
            'use_path_style_endpoint' => env('PRIVATE_DOCS_USE_PATH_STYLE_ENDPOINT', false),
            'visibility' => 'private',
            'throw' => false,
        ],


        'public_assets' => [
            'driver' => 's3',
            'key' => env('PUBLIC_ASSETS_ACCESS_KEY'),
            'secret' => env('PUBLIC_ASSETS_SECRET'),
            'region' => env('PUBLIC_ASSETS_REGION'),
            'bucket' => env('PUBLIC_ASSETS_BUCKET'),
            'endpoint' => env('PUBLIC_ASSETS_ENDPOINT'),
            'use_path_style_endpoint' => true,
        ],


        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
