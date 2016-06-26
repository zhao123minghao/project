<?php

namespace app\controllers;
use app\models\CouPro;
use app\models\CourseStu;
use app\models\CourseStudent;

class GradeController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $session = \yii::$app->session;
        $u_id = $session->get('user');
        $list = CouPro::getUserCourseNameList($u_id);
        return $this->render('index',['list'=>$list]);
    }

    public function actionSet($course = -1)
    {
        $post = \yii::$app->request->post();
        if($course !== -1)
        {
            $id = $course;
        }
        else
        {
            $id = $post['course'];
        }
        $session = \yii::$app->session;
        $u_id = $session->get('user');
        $list = CouPro::getUserCourseNameList($u_id);
        $stu_list = CourseStudent::find()->where(['cp_id'=>$id])->all();
        return $this->render('set',['list'=>$list,
            'stu_list'=>$stu_list]);
    }

    public function actionSetgrade()
    {
        $data = \yii::$app->request->get();
        $cs_id = $data['cs_id'];
        $cp_id = $data['cp_id'];
        $grade = $data['grade'];
        if($grade <= 100 && $grade >= 0) {
            $model = CourseStu::findOne($cs_id);
            $model->cs_gra = $grade;
            $model->save();
        }

        return $this->redirect(['grade/set','course'=>$cp_id]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
