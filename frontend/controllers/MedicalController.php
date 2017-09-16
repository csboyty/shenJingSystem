<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Medical;
use frontend\models\PatientInfo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\User;

/**
 * UserController implements the CRUD actions for User model.
 */
class MedicalController extends Controller
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
        $medical = $this->findModel($id);
        return $this->render("index",[
            'patient' => $patient,
            'medical' => $medical
        ]);
    }

    public function actionInfoUpdate(){
        $params=Yii::$app->request->post();
        $model=$this->findModel($params["patientId"]);
        $performance_info=$params["performance_info"];
        $examine_info = $params["examine_info"];
        $history_info = $params["history_info"];
        if(!$model){
            $model=new Medical();
            $model->patient_id=$params["patientId"];
        }

        $model->performance_info=$performance_info;
        $model->examine_info=$examine_info;
        $model->history_info=$history_info;

        $patientModel = PatientInfo::findOne($params["patientId"]);
        $patientMemo = json_decode($patientModel->memo);
        if(stripos($performance_info,'"chiXu":"有"')!==false){
            $patientMemo[1]=1;
        }else{
            $patientMemo[1]=0;
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
                "error_code"=>"medicalUpdateError"
            ];
        }
    }


    protected function findModel($patientId)
    {
        if (($model = Medical::findOne(['patient_id' => $patientId])) !== null) {
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
