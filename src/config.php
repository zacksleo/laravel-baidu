<?php

return [
    /*
    |--------------------------------------------------------------------------
    | 默认配置，将会合并到各模块中
    |--------------------------------------------------------------------------
    |
    | use_laravel_cache: 使用 Laravel 的缓存系统
    | level            : 日志级别，可选为：debug/info/notice/warning/error/critical/alert/emergency
    | file             : 日志文件位置(绝对路径!!!)，要求可写权限
    |
    */

    'defaults' => [
        'use_laravel_cache' => true,
        'log' => [
            'level' => env('BAIDU_LOG_LEVEL', 'debug'),
            'file'  => env('BAIDU_LOG_FILE', storage_path('logs/baidu.log')),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 百度熊掌号
    |--------------------------------------------------------------------------
    |
    | appId    : 开发者 ID
    | client_id: 开发者 ID
    | secret   : 开发者密钥
    | aes_key  : EncodingAESKey
    |
    */

    'bear' => [
        'app_id'    => env('BAIDU_BEAR_APPID', ''),
        'client_id' => env('BAIDU_BEAR_CLIENT_ID', ''),
        'secret'    => env('BAIDU_BEAR_SECRET', ''),
        'aes_key'   => env('BAIDU_BEAR_AES_KEY', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | 百度熊掌号TP
    |--------------------------------------------------------------------------
    |
    | appId    : 开发者 ID
    | client_id: 开发者 ID
    | secret   : 开发者密钥
    | aes_key  : EncodingAESKey
    |
    */

    'bear_tp' => [
        'app_id'    => env('BAIDU_BEAR_TP_APPID', ''),
        'client_id' => env('BAIDU_BEAR_TP_CLIENT_ID', ''),
        'secret'    => env('BAIDU_BEAR_TP_SECRET', ''),
        'aes_key'   => env('BAIDU_BEAR_TP_AES_KEY', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | 百度小程序
    |--------------------------------------------------------------------------
    |
    | appId : 百度小程序 App ID (智能小程序ID)
    | appKey: 百度小程序 App Key
    | secret: App Secret (智能小程序密匙)
    |
    */

    'smart_program' => [
        'app_id'  => env('BAIDU_SMART_PROGRAM_APPID', ''),
        'app_key' => env('BAIDU_SMART_PROGRAM_APP_KEY', ''),
        'secret'  => env('BAIDU_SMART_PROGRAM_SECRET', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | 百度小程序 TP
    |--------------------------------------------------------------------------
    |
    | appId : 百度小程序TP App ID (智能小程序ID)
    | appKey: 百度小程序TP App Key
    | secret: App Secret (智能小程序密匙)
    |
    */

    'smart_program_tp' => [
        'app_id'  => env('BAIDU_SMART_PROGRAM_TP_APPID', ''),
        'app_key' => env('BAIDU_SMART_PROGRAM_TP_APP_KEY', ''),
        'secret'  => env('BAIDU_SMART_PROGRAM_TP_SECRET', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | 百度收银台
    |--------------------------------------------------------------------------
    |
    | app_id     : 百度收银台 APP ID
    | app_key    : 百度收银台 App Key，此值并非智能小程序平台分配，请不要混淆
    | dead_id    : 百度收银台 Deal ID {@link https://dianshang.baidu.com/platform/doclist/index.html#!/doc/nuomiplus_1_guide/mini_program_cashier/parameter.md}
    | private_key: 应用私钥字符串，当行无包裹
    | public_key : 平台公钥字符串，当行无包裹
    |
    */

    'payment' => [
        'app_id'      => env('BAIDU_PAYMENT_APPID', ''),
        'app_key'     => env('BAIDU_PAYMENT_APP_KEY', ''),
        'deal_id'     => env('BAIDU_PAYMENT_DEALID', ''),
        'private_key' => env('BAIDU_PAYMENT_APP_PRIVATE_KEY', ''),
        'public_key'  => env('BAIDU_PAYMENT_PLATFORM_PUBLIC_KEY', ''),
    ],
];
