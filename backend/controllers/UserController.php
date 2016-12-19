<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                            User::ROLE_SUPER_ADMIN
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
        $query=User::find();
        $query->where(["not",["role"=>User::ROLE_SUPER_ADMIN]]);
        $count=$query->count();
        $aaData=$query
            ->asArray()
            ->limit($limit)
            ->offset($offset)
            ->all();

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

        $model=new User();

        return $this->render('createOrUpdate',[
            'model' => $model,
        ]);
    }

    public function actionUpdate($id){

        //这样获取会将isNewRecord设置为false
        $model = $this->findModel($id);

        return $this->render('createOrUpdate',[
            'model' => $model,
        ]);
    }

    /**
     *新增和修改提交
     * @return array
     */
    public function actionSubmit(){
        $params=Yii::$app->request->post();

        if(isset($params["id"])){
            $model = $this->findModel($params["id"]);
        }else{
            $model=new User();
            $params["role"]=USER::ROLE_ADMIN;
            $model->generateAuthKey();
            $params["auth_key"]=$model->getAuthKey();

            //对密码加密
            $model->setPassword($params["password"]);
            $params["password"]=$model->getAttribute("password");
        }

        $data=array();

        //yii自动生成的form参数是Enterprise["name"]这种形式，获取后就会是在一个Enterprise中
        $data["User"]=$params;

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($model->load($data) && $model->save()) {
            return [
                "success"=>true
            ];
        }else{
            return [
                "success"=>false,
                "error_code"=>1
            ];
        }
    }

    public function actionSetPassword(){
        $params=Yii::$app->request->post();
        $model = $this->findModel($params["id"]);

        //对密码加密
        $model->setPassword($params["password"]);
        $params["password"]=$model->getAttribute("password");

        $data=array();
        $data["User"]=$params;

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($model->load($data) && $model->save()) {
            return [
                "success"=>true
            ];
        }else{
            return [
                "success"=>false,
                "error_code"=>1
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
                "error_code"=>1
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
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
