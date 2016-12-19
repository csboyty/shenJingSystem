<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PatientInfo;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\User;

/**
 * Class AccountController 账号控制器
 * @package backend\controllers
 */
class StatController extends \yii\web\Controller
{

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

    public function actionIndex(){
        $date=date("Y-m-d");
        $monthDate = date("Y-m-01",strtotime($date));

        $query=PatientInfo::find();
        $count=$query->count();
        $monthQuery=clone $query;
        $query->where(["create_at"=>$date]);
        $todayCount=$query->count();

        $monthQuery->where(["and","create_at>=:monthDate","create_at<=:date"],[":date"=>$date,":monthDate"=>$monthDate]);
        $monthCount=$monthQuery->count();

        $counts=array("all"=>$count,"today"=>$todayCount,"month"=>$monthCount);

        return $this->render("index",[
            "counts"=>$counts
        ]);
    }

    public function actionGetSexData(){
        $query=PatientInfo::find();
        $count=$query->count();
        $query->where(["sex"=>"男"]);
        $countNan=$query->count();

        $countNv=$count-$countNan;

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            "success"=>true,
            "data"=>array(
                array("value"=>$countNan,"name"=>"男"),
                array("value"=>$countNv,"name"=>"女")
            )
        ];
    }

    public function actionGetAgeData(){
        $query=PatientInfo::find();
        $b30to40Query=clone $query;
        $b40to50Query=clone $query;
        $b50to60Query=clone $query;
        $b60to70Query=clone $query;
        $b70to80Query=clone $query;

        $b30to40Count=$b30to40Query->where(["and","age>=:low","age<=:up"],
            [":low"=>30,":up"=>40])->count();
        $b40to50Count=$b40to50Query->where(["and","age>=:low","age<=:up"],
            [":low"=>40,":up"=>50])->count();
        $b50to60Count=$b50to60Query->where(["and","age>=:low","age<=:up"],
            [":low"=>50,":up"=>60])->count();
        $b60to70Count=$b60to70Query->where(["and","age>=:low","age<=:up"],
            [":low"=>60,":up"=>70])->count();
        $b70to80Count=$b70to80Query->where(["and","age>=:low","age<=:up"],
            [":low"=>70,":up"=>80])->count();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            "success"=>true,
            "data"=>array(
                array("value"=>$b30to40Count,"name"=>"30-40"),
                array("value"=>$b40to50Count,"name"=>"40-50"),
                array("value"=>$b50to60Count,"name"=>"50-60"),
                array("value"=>$b60to70Count,"name"=>"60-70"),
                array("value"=>$b70to80Count,"name"=>"70-80")
            )
        ];
    }
}
