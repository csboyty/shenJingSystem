<?php

namespace frontend\controllers;

use Yii;
use frontend\models\DiagnoseInfo;
use frontend\models\PatientInfo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\User;

/**
 * UserController implements the CRUD actions for User model.
 */
class DiagnoseInfoController extends Controller
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

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $patient = $this->findPatientModel($id);
        $diagnoseInfo = $this->findModel($id);
        return $this->render("index",[
            'patient' => $patient,
            'diagnoseInfo' => $diagnoseInfo
        ]);
    }

    /**
     * 这个函数做了一些处理，如果type的值为空，
     * 那就是直接保存col的信息，而不是col下面的某一个小字段
     * @return array
     */
    public function actionInfoUpdate(){
        $params=Yii::$app->request->post();
        $model=$this->findModel($params["patientId"]);
        $attack_type = $params["attack_type"];
        $type = $params["type"];
        $status = $params["status"];
        if(!$model){
            $model=new DiagnoseInfo();

            $model->patient_id=$params["patientId"];
        }

        $model->attack_type=$attack_type;
        $model->type=$type;
        $model->status=$status;

        $patientModel = PatientInfo::findOne($params["patientId"]);
        $patientMemo = json_decode($patientModel->memo);
        if(stripos($attack_type,'"nanZhiXingValue":"有"')!==false){
            $patientMemo[0]=1;
        }else{
            $patientMemo[0]=0;
        }
        $patientModel->memo = json_encode($patientMemo);
        $patientModel->save();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($model->save()){
            return [
                "success"=>true
            ];
        }else{
            return [
                "success"=>false,
                "error_code"=>"diagnoseInfoUpdateError"
            ];
        }
    }

    protected function findModel($patientId)
    {
        if (($model = DiagnoseInfo::findOne(['patient_id' => $patientId])) !== null) {
            return $model;
        } else {
            return false;
        }
    }

    protected function findPatientModel($id)
    {
        if (($model = PatientInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
