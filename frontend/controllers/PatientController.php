<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PatientInfo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\User;

/**
 * UserController implements the CRUD actions for User model.
 */
class PatientController extends Controller
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList(){
        $params=Yii::$app->request->queryParams;
        $limit=$params["iDisplayLength"];
        $offset=$params["iDisplayStart"];
        $sEcho = $params["sEcho"];
        $filter = $params["filter"];
        $filterType = $params["filterType"];
        $orderByName = $params["orderByName"];
        $order = $params["order"];
        $query=PatientInfo::find();
        if($filter){
            $query->where(['or',
                ['like','no',$filter],
                ['like','fullname',$filter]]);
        }
        if($filterType){
            $query->innerJoinWith(['diagnoseInfo' => function ($query) use($filterType) {
                $query->where(["like","diagnose_info.attack_type",$filterType]);
            }]);
        }



        $count=$query->count();
        $aaData=$query
            ->asArray()
            ->orderBy($orderByName." ".$order)
            ->limit($limit)
            ->offset($offset)
            ->all();

        //echo $query->createCommand()->getRawSql();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'success' => true,
            'aaData' => $aaData,
            "iTotalRecords"=>$count,
            "iTotalDisplayRecords"=>$count,
            "sEcho"=>$sEcho
        ];

    }

    public function actionCreate(){

        $model=new PatientInfo();

        return $this->render('info',[
            'model' => $model,
        ]);
    }

    public function actionInfo($id){

        //这样获取会将isNewRecord设置为false
        $model = $this->findModel($id);

        return $this->render('info',[
            'model' => $model,
        ]);
    }

    /**
     *新增和修改提交
     * @return array
     */
    public function actionSubmit(){
        $params=Yii::$app->request->post();

        if(isset($params["isEdit"])){
            $model = $this->findModel($params["id"]);
        }else{
            $model=new PatientInfo();
        }

        $data=array();

        //yii自动生成的form参数是Enterprise["name"]这种形式，获取后就会是在一个Enterprise中
        $data["PatientInfo"]=$params;

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($model->load($data) && $model->save()) {
            return [
                "success"=>true,
                "id" => $model->id
            ];
        }else{
            return [
                "success"=>false,
                "error_code"=>"patientSubmitError"
            ];
        }
    }

    public function actionDelete($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if($this->findModel($id)->delete()){
            return [
                "success"=>true
            ];
        }else{
            return [
                "success"=>false,
                "error_code"=>"patientDeleteError"
            ];
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PatientInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
