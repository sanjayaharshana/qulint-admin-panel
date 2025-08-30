<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => 'public',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root'   => storage_path('app'),
        ],

        'public' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public'),
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key'    => env('AWS_ACCESS_KEY_ID', 'your-key'),
            'secret' => env('AWS_SECRET_ACCESS_KEY', 'your-secret'),
            'region' => env('AWS_DEFAULT_REGION', 'your-region'),
            'bucket' => env('AWS_BUCKET', 'your-bucket'),
        ],

        'admin' => [
            'driver'     => 'local',
            'root'       => public_path('uploads'),
            'visibility' => 'public',
            'url'        => 'http://localhost:8000/uploads/',
        ],

        'qiniu' => [
            'driver'  => 'qiniu',
            'domains' => [
                'default' => env('QINIU_DOMAIN', 'your-domain.clouddn.com'),
                'https'   => env('QINIU_HTTPS_DOMAIN', 'dn-yourdomain.qbox.me'),
                'custom'  => env('QINIU_CUSTOM_DOMAIN', 'static.abc.com'),
            ],
            'access_key' => env('QINIU_ACCESS_KEY', 'your-access-key'),
            'secret_key' => env('QINIU_SECRET_KEY', 'your-secret-key'),
            'bucket'     => env('QINIU_BUCKET', 'your-bucket'),
            'notify_url' => env('QINIU_NOTIFY_URL', ''),
        ],

        'aliyun' => [
            'driver'     => 'oss',
            'access_id'  => env('ALIYUN_ACCESS_ID', 'your-access-id'),
            'access_key' => env('ALIYUN_ACCESS_KEY', 'your-access-key'),
            'bucket'     => env('ALIYUN_BUCKET', 'your-bucket'),
            'endpoint'   => env('ALIYUN_ENDPOINT', 'oss-cn-shanghai.aliyuncs.com'),
        ],

    ],

];
