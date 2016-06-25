<?php

namespace app\controllers;

use Yii;
use app\models\CouPro;
use app\models\CouProSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CouproController implements the CRUD actions for CouPro model.
 */
class CouproController extends Controller
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
     * Lists all CouPro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CouProSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CouPro model.
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
     * Creates a new CouPro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CouPro();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cp_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CouPro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cp_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CouPro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAdd($id)
    {
        if($GLOBALS['professor_select'] === 'off'){
            return $this->render('@app/views/site/blank');
        }
        $cou_pro = new CouPro();
        $session = \yii::$app->session;
        $u_id = $session->get('user');
        $cou_pro->cp_pro = $u_id;
        $cou_pro->cp_cou = $id;
        $cou_pro->cp_sem = $GLOBALS['this_semester'][0];
        $cou_pro->save();
        return $this->redirect(['course/procou']);
    }

    public function actionRemove($id)
    {
        if($GLOBALS['professor_select'] === 'off'){
            return $this->render('@app/views/site/blank');
        }
        $session = \yii::$app->session;
        $u_id = $session->get('user');
        $cou_pro = CouPro::findOne(['cp_pro'=>$u_id,'cp_cou'=>$id]);
        $cou_pro->delete();
        return $this->redirect(['course/procou']);
    }

    /**
     * Finds the CouPro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CouPro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CouPro::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
