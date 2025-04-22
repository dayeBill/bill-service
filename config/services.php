<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack'     => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel'              => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'socialite' => [
        'weixin' => [
            'provider'      => 'wechat_mini',  // <-- provider name
            'client_id'     => env('WECHAT_CLIENT_ID'),
            'client_secret' => env('WECHAT_CLIENT_SECRET'),
        ],
    ],


    'easy-sms'=>[
        'timeout' => 5.0,
        // 默认发送配置
        'default' => [
            // 网关调用策略，默认：顺序调用
            'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

            // 默认可用的发送网关
            'gateways' => [
                'aliyun',
            ],
        ],
        // 可用的网关配置
        'gateways' => [

            'aliyun' => [
                'access_key_id' => env('SMS_ALIYUN_ACCESS_KEY_ID'),
                'access_key_secret' => env('SMS_ALIYUN_ACCESS_KEY_SECRET'),
                'sign_name' => env('SMS_ALIYUN_SIGN_NAME'),
            ],
            //...
        ],

    ]
];
