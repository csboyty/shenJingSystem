<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use common\components\AccessRule;
use yii\filters\AccessControl;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $layout = false;

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

    public function actionLogin()
    {
        $this->layout="login";

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(["site/home"]);
        }

        $model = new LoginForm();

        $params=Yii::$app->request->post();

        $data=array();
        $data["LoginForm"]=$params;

        if ($model->load($data) && $model->login()) {
            return $this->redirect(["site/home"]);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    public function actionError(){
        return $this->render("error");
    }

    public function actionHome(){
        $this->layout = "main";
        return $this->render("home");
    }

    /**
     * 获取加密的密码
     * @param $password
     * @return string
     */
    public function actionPassword($password){
        $model=new User();
        $model->setPassword($password);
        return $model->password;
    }
}
