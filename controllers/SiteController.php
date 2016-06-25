<?php

namespace app\controllers;

use app\models\User;
use app\models\Professor;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $session = \yii::$app->session;
        $user_type = $session->get('type',-1);
        if (!\yii::$app->user->isGuest) {
            return $this->render('index',["user_type"=>$user_type]);
        }
        else{
            return $this->actionLogin();
        }/**/
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $session = \yii::$app->session;
            if(!$session->isActive)
            {
                $session->open();

            }
            $type = $model->getUser()->getUserType();
            $id = $model->getUser()->id;
            $session->set('type',$type);
            if($type === '1'){
                $pro = Professor::findOne($id);
                $session->set('depart',$pro->pro_depart);
            }
            $session->set('user',$id);
            //$session->set('password',$model->getUser()->password);
            return $this->actionIndex();
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        $session = \yii::$app->session;
        if($session->isActive)
        {
           $session->close();
        }
        return $this->goHome();
    }

    public function actionAbout()
    {
        $session = \yii::$app->session;
        $user_type = $session->get('type',-1);

        return $this->render('about',["user_type"=>$user_type,
            'acontent'=>'']);
    }
    public function actionPass()
    {
        $session = \yii::$app->session;
        $user = $session->get('user',-1);
        $user_type = $session->get('type',-1);
        //$pass = $session->get('type',-1);
        $post = \yii::$app->request->post();
        $old = $post['old'];
        $new = $post['new'];
        $confirm = $post['confirm'];

        $model = User::findOne($user);
        $ps = $model->password;

        if($old === '' || $new === '' || $confirm === '')
        {
            $con = 'Input Incorrect';
        }
        else
        {
            if($new !== $confirm)
            {
                $con = 'new password is not the same as confirm password';
            }
            else {
                if ($ps === $old) {
                    $model->password = $new;
                    $model->save();
                    $con = 'password changed!';
                } else {
                    $con = 'old password incorrect';
                }
            }
        }

        return $this->render('about',["user_type"=>$user_type,
            'acontent'=>$con]);
    }
}
