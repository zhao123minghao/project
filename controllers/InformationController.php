<?php

namespace app\controllers;

use Yii;
use app\models\Information;
use app\models\InformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;

/**
 * InformationController implements the CRUD actions for Information model.
 */
class InformationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Information models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Information model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Information model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Information();

        if ($model->load(Yii::$app->request->post())) {
            $message = $model->message;
            $current_date = date('y-m-d');
            if($model->user_id === '-1')
            {
                $users = User::find()->all();
                foreach($users as $item){
                    $infor = new Information();
                    $infor->user_id = $item->id;
                    $infor->message = $message;
                    $infor->date = $current_date;
                    $infor->save();
                }
            }
            else if($model->user_id === '-2')
            {
                $users = User::find()->where(['user_type'=>2])->all();
                foreach($users as $item){
                    $infor = new Information();
                    $infor->user_id = $item->id;
                    $infor->message = $message;
                    $infor->date = $current_date;
                    $infor->save();
                }
            }
            else if($model->user_id === '-3')
            {
                $users = User::find()->where(['user_type'=>1])->all();
                foreach($users as $item){
                    $infor = new Information();
                    $infor->user_id = $item->id;
                    $infor->message = $message;
                    $infor->date = $current_date;
                    $infor->save();
                }
            }
            else
            {
                $model->date = $current_date;
                $model->save();
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Information model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->infor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Information model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Information model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Information the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Information::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUser()
    {
        $session = \yii::$app->session;
        $user = $session->get('user');
        $type = $session->get('type');
        $model = Information::find()->where(['user_id'=>$user])->all();
        foreach($model as $item){
            $item->status = 0;
            $item->save();
        }
        return $this->render('user', [
            'model' => $model,'type'=>$type
        ]);
    }
}
