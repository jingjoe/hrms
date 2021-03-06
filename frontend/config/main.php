<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name'=>'Hospital Risk Management System',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Bangkok',
    'language'=>'th_TH',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
            'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '../../backend/web',
            'scriptUrl' => '../../backend/web/index.php',
            'enablePrettyUrl' => false,
            'showScriptName' => true,
        ],
        'thaiFormatter'=>[
        'class'=>'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
