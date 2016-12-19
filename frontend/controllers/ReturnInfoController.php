<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ReturnInfo;
use frontend\models\PatientInfo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\User;

/**
 * UserController implements the CRUD actions for User model.
 */
class ReturnInfoController extends Controller
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
        $returnInfo = $this->findModel($id);
        return $this->render("index",[
            'patient' => $patient,
            'returnInfo' => $returnInfo
        ]);
    }
    public function actionRecord($patientId,$date)
    {
        $patient = $this->findPatientModel($patientId);

        if(isset($date)){
            $returnInfo = $this->findModel($patientId);
            $check_result=json_decode($returnInfo->check_result);

            $record=json_decode($check_result->$date);

            return $this->render("record",[
                'patient' => $patient,
                'record'=>$record
            ]);
        }else{
            return $this->render("record",[
                'patient' => $patient
            ]);
        }
    }

    public function actionRecordSubmit(){
        $params=Yii::$app->request->post();
        $model=$this->findModel($params["patientId"]);
        $date=date("Y-m-d");
        if(!$model){
            $model=new ReturnInfo();
            $info=array($date=>$params["check_result"]);
            $model->patient_id=$params["patientId"];
        }else{
            if(isset($model->check_result)){
                $info=$model->check_result;
                $info=json_decode($info);
                $info->$date=$params["check_result"];
            }else{
                $info=array($date=>$params["check_result"]);
            }
        }

        $model->check_result=json_encode($info);


        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($model->save()){
            return [
                "success"=>true
            ];
        }else{
            return [
                "success"=>false,
                "error_code"=>"returnInfoAddError"
            ];
        }
    }

    public function actionInfoUpdate(){
        $params=Yii::$app->request->post();
        $model=$this->findModel($params["patientId"]);
        $type=$params["type"];
        $col=$params["col"];
        if(!$model){
            $model=new ReturnInfo();
            $info=array($type=>$params[$type]);
            $model->patient_id=$params["patientId"];
        }else{
            if(isset($model->$col)){
                $info=$model->$col;
                $info=json_decode($info);
                $info->$type=$params[$type];
            }else{
                $info=array($type=>$params[$type]);
            }
        }

        $model->$col=json_encode($info);


        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($model->save()){
            return [
                "success"=>true
            ];
        }else{
            return [
                "success"=>false,
                "error_code"=>"returnInfoUpdateError"
            ];
        }
    }


    protected function findModel($patientId)
    {
        if (($model = ReturnInfo::findOne(['patient_id' => $patientId])) !== null) {
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
