<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Керчь - Климат',
    'charset' => 'UTF-8',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
//    'defaultRoute' => 'news/index',
//    'catchAll' => ['site/closed'],
    'aliases' => [
        '@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets'
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9vOJygqvRuJqc3NmC41R37bpQgBqFVmA',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\SystemUsers',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'base/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
//            'useFileTransport' => true,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.mail.ru',
//                'username' => 'login',
//                'password' => 'password',
//                'port' => '465',
//                'encryption' => 'ssl',
//            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'baseUrl'=> '',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_PERMANENT
            ],
//            'suffix' => '.html',
            'rules' => [
                '<controller:(news|about|comments)>/<action:(index)>/<page:\d+>' => '<controller>/<action>',
                '<controller:(gallery)>/<action:(view)>/<id:\d+>/<page:\d+>' => '<controller>/<action>',
                '<controller:(news|gallery|about)>/<action:(view|read|update)>/<id:\d+>' => '<controller>/<action>',
                '/dmn/<controller:(user|news|orders|comments|gallery|photo)>/<action:(view|update|delete|index|create|password)>/<id:\d+>' => '/dmn/<controller>/<action>',
//                //
//                [
//                    'pattern' => 'about',
//                    'route' => 'about/index',
//                    'suffix' => '.html',
//                ]
            ],
        ],
    ],
    // Europe/Moscow для России прим(. пер.) ’timeZone’ => ’America/Los_Angeles’,
    'timeZone' => 'Europe/Moscow',
    'language' => 'ru-RU',
    'modules' => [
        'dmn' => [
            'defaultRoute' => 'welcome',
            'class' => 'app\modules\dmn\dmn',
//            'layout' => 'admin',
            'layout' => 'main',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
