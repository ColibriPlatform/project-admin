<?php

$extensions = require __DIR__ . '/../vendor/yiisoft/extensions.php';

$config = [
    'id' => 'colibri-project-admin',
    'name' => 'Colibri project admin',
    'basePath' => realpath(__DIR__ . '/..'),
    'defaultRoute' => 'site/default',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'components' => [
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/colibri',
                'baseUrl' => '@web/themes/colibri',
                'pathMap' => [
                    '@colibri/base/views' => '@app/themes/colibri',
                ],
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'modules' => [
        'site' => [
            'class' => 'app\modules\site\Module',
        ],
        'admin' => [
            'class' => 'colibri\admin\Module',
            'modules' => [
                'site' => 'app\modules\site\admin\Module'
            ]
        ],
    ],
    'bootstrap' => [
        'site',
        'admin',
    ],
];

if (YII_DEBUG && isset($extensions['yiisoft/yii2-debug'])) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

if (YII_ENV_DEV) {
    if (isset($extensions['yiisoft/yii2-gii'])) {
        $config['bootstrap'][] = 'gii';
        $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1'],
        ];
    }
}

return $config;
