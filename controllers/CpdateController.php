<?php

namespace app\controllers;

use Yii;
use app\models\CpDate;
use app\models\CpDateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CpdateController implements the CRUD actions for CpDate model.
 */
class CpdateController extends Controller
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
     * Lists all CpDate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Yii::$app->request->get();
        $data = $model['cp_id'];
        $searchModel = new CpDateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$data);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cp_id' => $data
        ]);
    }

    /**
     * Displays a single CpDate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Yii::$app->request->get();
        $data = $model['cp_id'];
        return $this->render('view', [
            'model' => $this->findModel($id),
            'cp_id' => $data
        ]);
    }

    /**
     * Creates a new CpDate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CpDate();
        $cp = Yii::$app->request->get();
        $data = $cp['cp_id'];
        $model->cpd_cp = $data;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cpd_id,'cp_id' => $data]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'cp_id' => $data
            ]);
        }
    }

    /**
     * Updates an existing CpDate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Yii::$app->request->get();
        $data = $model['cp_id'];
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cpd_id,'cp_id' => $data]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'cp_id' => $data
            ]);
        }
    }

    /**
     * Deletes an existing CpDate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Yii::$app->request->get();
        $data = $model['cp_id'];
        $this->findModel($id)->delete();

        return $this->redirect(['index','cp_id' => $data]);
    }

    /**
     * Finds the CpDate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CpDate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CpDate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
