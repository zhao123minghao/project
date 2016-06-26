<?php

namespace app\controllers;

use app\models\CouPro;
use app\models\CourseStu;
use app\models\CpDate;
use Yii;
use app\models\User;
use app\models\Student;
use app\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CourseProfessor;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = \yii::$app->session;
        $user_type = $session->get('type',-1);

        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $session = \yii::$app->session;
        $user_type = $session->get('type',-1);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = \yii::$app->session;
        $user_type = $session->get('type',-1);

        $model = new Student();
        $user = new User();

        if ($model->load(Yii::$app->request->post())) {
            $stu = User::findOne($model->user_id);
            if($stu !== null){
                $model->addError('user_id', 'ID exists');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            $user->id = $model->user_id;
            $user->username = strval($model->user_id);
            $user->password = '#'.$model->stu_ssn;
            $user->user_type = 2;
            if($model->stu_cost === ''){
                $model->stu_cost = 0;
            }
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
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $session = \yii::$app->session;
        $user_type = $session->get('type',-1);
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
     * Deletes an existing Student model.
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
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

    public function actionSche()
    {
        $session = \yii::$app->session;
        $user_id = $session->get('user');
        $list = Student::getCourseList($user_id);
        return $this->render('sche',['list'=>$list,]);
    }

    public function actionSelect($message = 0)
    {
        if($GLOBALS['student_select'] === 'off'){
            return $this->render('@app/views/site/blank');
        }
        $session = \yii::$app->session;
        $user_id = $session->get('user');
        $list = Student::getCourseNumList($user_id);
        $slist = Student::getCourseColorList($user_id);
        $prc = new CourseProfessor();
        $cp_major = 0;
        $cp_first = -1;
        $cp_secnond = -1;

        foreach($list as $value)
        {
            if($value[1] == 0)
            {
                $cp_major ++;
            }
            if($value[1] == 1)
            {
                $cp_first = $value[0];
            }
            if($value[1] == 2)
            {
                $cp_secnond = $value[0];
            }
        }

        return $this->render('select',
            ['list'=>$list,'cp'=>$prc->getCpList(),'slist'=>$slist,'message'=>$message,
            'num'=>$cp_major,'fri'=>$cp_first,'sec'=>$cp_secnond]);
    }

    public function actionAdd()
    {
        if($GLOBALS['student_select'] === 'off'){
            return $this->render('@app/views/site/blank');
        }
        $ret = 0;
        $data = \yii::$app->request->get();
        $id = $data['id'];
        $session = \yii::$app->session;
        $user_id = $session->get('user');
        $slist = Student::getCourseColorList($user_id);
        if($this->timeCheck($slist,$id)) {
            $cp = CouPro::findOne($id);
            if($cp->cp_num <10) {
                $model = new CourseStu();
                $cp->cp_num++;
                $model->cs_cp = $id;
                $model->cs_stu = $user_id;
                $model->cs_type = 0;
                $model->save();
                $cp->save();
            }
            else
            {
                $ret = 2;
            }
        }
        else
        {
            $ret = 1;
        }
        return $this->redirect(['student/select','message'=>$ret]);
    }

    public function actionRemove()
    {
        if($GLOBALS['student_select'] === 'off'){
            return $this->render('@app/views/site/blank');
        }
        $data = \yii::$app->request->get();
        $id = $data['id'];
        $model = CourseStu::findOne($id);
        if($model->cs_type === 0) {
            $cp_id = $model->cs_cp;
            $cp = CouPro::findOne($cp_id);
            $cp->cp_num--;
            $cp->save();
        }
        $model->delete();

        return $this->redirect(['student/select']);
    }

    public function actionAddfri()
    {
        if($GLOBALS['student_select'] === 'off'){
            return $this->render('@app/views/site/blank');
        }
        $ret = 0;
        $data = \yii::$app->request->get();
        $id = $data['id'];
        $session = \yii::$app->session;
        $user_id = $session->get('user');
        $slist = Student::getCourseColorList($user_id);
        if($this->timeCheck($slist,$id)) {
        $model = new CourseStu();
        $model->cs_cp = $id;
        $model->cs_stu = $user_id;
        $model->cs_type = 1;
        $model->save();
        }
        else
        {
            $ret = 1;
        }
        return $this->redirect(['student/select','message'=>$ret]);
    }
    public function actionAddsec()
    {
        if($GLOBALS['student_select'] === 'off'){
            return $this->render('@app/views/site/blank');
        }
        $ret = 0;
        $data = \yii::$app->request->get();
        $id = $data['id'];
        $session = \yii::$app->session;
        $user_id = $session->get('user');
        $slist = Student::getCourseColorList($user_id);
        if($this->timeCheck($slist,$id)) {
        $model = new CourseStu();
        $model->cs_cp = $id;
        $model->cs_stu = $user_id;
        $model->cs_type = 2;
        $model->save();
        }
        else
        {
            $ret = 1;
        }
        return $this->redirect(['student/select','message'=>$ret]);
    }

    public function timeCheck($cou_list,$cou_id)
    {
        for($i=1;$i<8;$i++)
        {
            for($j=1;$j<6;$j++)
            {
                $cou[$i][$j] = 0;
            }
        }
        foreach($cou_list as $value)
        {
            $cou[$value[0]][$value[1]] = 1;
        }
        $cpd = CpDate::find()->where(['cpd_cp'=>$cou_id])->all();
        foreach($cpd as $item)
        {
            if($cou[$item->cpd_date][$item->cpd_time] === 1)
            {
                return false;
            }
        }
        return true;
    }
}
