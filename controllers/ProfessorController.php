<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Professor;
use app\models\ProfessorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfessorController implements the CRUD actions for Professor model.
 */
class ProfessorController extends Controller
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
     * Lists all Professor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfessorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Professor model.
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
     * Creates a new Professor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Professor();
        $user = new User();
        if ($model->load(Yii::$app->request->post())) {
            $pro = User::findOne($model->user_id);
            if($pro !== null){
                $model->addError('user_id', 'ID exists');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            $user->id = $model->user_id;
            $user->username = strval($model->user_id);
            $user->password = '#'.$model->pro_ssn;
            $user->user_type = 1;
            if($user->save()) {
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->user_id]);
                }
                else{
                    $user->delete();
                }
            }
        }

        return $this->render('create', [
                'model' => $model,
            ]);

    }

    /**
     * Updates an existing Professor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = $this->findUser($id);

        if ($model->load(Yii::$app->request->post())) {
            $user->id = $model->user_id;
            if($user->save())
            {
                if($model->save())
                {
                    return $this->redirect(['view', 'id' => $model->user_id]);
                }
            }
        }
        return $this->render('update', [
                'model' => $model,
            ]);
    }

    /**
     * Deletes an existing Professor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $this->findUser($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Professor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Professor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Professor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
