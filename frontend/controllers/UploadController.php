<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\User;

/**
 * UserController implements the CRUD actions for User model.
 */
class UploadController extends Controller
{
    private $dir="../../uploads";

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN
                        ]
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
            if($_FILES['file']['size'] > 500*1024*1024) { //500 MB (size is also in bytes)
                return [
                    "success"=>false,
                    "error_code"=>"uploadSizeError"
                ];
            }

            if(!is_dir($this->dir)){
                mkdir($this->dir);
            }

            $pathInfo=pathinfo($_FILES['file']['name']);

            list($msec, $sec) = explode(' ', microtime());
            $msectime =  (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);

            $target=$this->dir.'/'.$msectime.".".$pathInfo["extension"];

            if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
            {
                return [
                    "success"=>true,
                    "url"=>$target
                ];
            }
            else
            {
                return [
                    "success"=>false,
                    "error_code"=>"uploadError"
                ];
            }
        }else{
            return [
                "success"=>false,
                "error_code"=>"uploadError"
            ];
        }
    }
}
