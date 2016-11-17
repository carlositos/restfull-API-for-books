<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'm1YI5xDaC3DVQRVU86fP-QQcX9hU8m26',
            'parsers' => [
	            'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
	        // ...
	        'formatters' => [
		        \yii\web\Response::FORMAT_JSON => [
			        'class' => 'yii\web\JsonResponseFormatter',
			        'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
			        'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
		        ],
	        ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
	        'enablePrettyUrl' => true,
	        'showScriptName' => false,
	        'rules' => [
		        ['class' => 'yii\rest\UrlRule', 'controller' => ['genre','author','book']],
	        ],
        ],
    ],
];

return $config;
