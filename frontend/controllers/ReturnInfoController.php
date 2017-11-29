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
    public function actionRecord($patientId)
    {
        $patient = $this->findPatientModel($patientId);

        $recordIndex = isset($_GET["recordIndex"])?$_GET["recordIndex"]:null;

        if(isset($recordIndex)){
            $returnInfo = $this->findModel($patientId);
            $check_result=json_decode($returnInfo->check_result);

            $record=$check_result[$recordIndex];


            return $this->render("record",[
                'patient' => $patient,
                'recordIndex' => $recordIndex,
                'record'=>$record
            ]);
        }else{
            $returnInfo = $this->findModel($patientId);
            $check_result=isset($returnInfo->check_result)?json_decode($returnInfo->check_result):array();
            $recordIndex = count($check_result);
            return $this->render("record",[
                'patient' => $patient,
                'recordIndex' => $recordIndex,
            ]);
        }
    }

    public function actionRecordSubmit(){
        $params=Yii::$app->request->post();
        $model=$this->findModel($params["patientId"]);
        $info = json_decode($params["value"]);
        $col = $params["col"];
        $recordIndex = isset($params["recordIndex"])?$params["recordIndex"]:null;
        if(!$model){
            $model=new ReturnInfo();
            $model->patient_id=$params["patientId"];
            $info->recordIndex = 0;
            $model->$col = json_encode(array($info));
        }else{
            $oldColValue = isset($model->$col)?json_decode($model->$col):array();
            if(isset($recordIndex)){
                $info->recordIndex = $recordIndex;
                $oldColValue[$recordIndex] = $info;
            }else{
                $count = count($oldColValue);
                $recordIndex = $count;
                $info->recordIndex = $recordIndex;
                array_push($oldColValue,$info);
            }

            $model->$col = json_encode($oldColValue);
        }


        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($model->save()){
            return [
                "success"=>true,
                "recordIndex"=>$recordIndex
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
        $col=$params["col"];
        $info=$params["value"];
        if(!$model){
            $model=new ReturnInfo();
            $model->patient_id=$params["patientId"];
        }

        $model->$col=$info;


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
