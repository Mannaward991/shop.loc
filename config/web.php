<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
	///
	'language' => 'ru-RU',
	'sourceLanguage' => 'en-US', // !!! Базовый язык лудше оставить англисским
	'timeZone' => 'Europe/Moscow',
	///
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	'defaultRoute' => 'shop/index',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dojkfgiigfvigjhbilvjgbigcboifiogboigciitgjifjgb',
	        'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	    /*
	    'session' => [
		    'class' => 'yii\web\CacheSession',
		    // 'cache' => 'mycache',
	    ],
	    */
        'user' => [
            'identityClass' => 'app\models\Identity',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'shop/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
	        'viewPath' => '@app/mail',
	        'htmlLayout' => 'layouts/main-html',
	        'textLayout' => 'layouts/main-text',
	        'messageConfig' => [
		        'charset' => 'UTF-8',
	        ],
            'useFileTransport' => true,
        ],
	    /*
	    'authManager' => [
		    'class' => 'yii\rbac\DbManager',
	    ],
	    //yii migrate --migrationPath=@yii/rbac/migrations
	    */
	    /*
	    'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
	        'viewPath' => '@app/mail',
	        'htmlLayout' => 'layouts/main-html',
	        'textLayout' => 'layouts/main-text',
	        'messageConfig' => [
		        'charset' => 'UTF-8',
		        'from' => ['nicesurprise.crimea@gmail.com' => 'Nice surprise'],
	        ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
              'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'nicesurprise.crimea@gmail.com',
                'password' => 'NSasdfg123',
                'port' => '465',
                'encryption' => 'ssl',
              ],
        ],
	    */
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
	            'reviews-confirm/<href:\w{32}>' => 'shop/reviews-confirm',
            	'confirmation/<href:\w{32}>' => 'shop/confirmation',
	            'reviews/<page:\d+>' => 'shop/reviews',
	            'catalog/<id:\d+>/<page:\d+>' => 'shop/catalog',
	            'catalog/<id:\d+>' => 'shop/catalog',
	            'product/<id:\d+>' => 'shop/product',
	            'reviews/<action>' => 'reviews/<action>',
	            'goods/<action>' => 'goods/<action>',
	            'orders/<action>' => 'orders/<action>',
	            'groups/<action>' => 'groups/<action>',
	            'admin/<action>' => 'admin/<action>',
	            '<action>' => 'shop/<action>',
            ],
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
