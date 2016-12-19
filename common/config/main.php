<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xiangyavalidationkey',
            'enableCsrfValidation' => false //后期还是建议开启http://www.yiichina.com/tutorial/449
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,//加了这两句则不能使用gii  http://localhost/xiangya/frontend/web/index.php?r=gii
            'showScriptName' => false,
            'rules'=>array(
                '<controller:[a-z-]+>/<id:\d+>'=>'<controller>/index',
                '<controller:[a-z-]+>/<action:[a-z-]+>/<id:\d+>'=>'<controller>/<action>'
            ),
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ]
    ],
];
