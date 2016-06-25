<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//before we use it we need to set GLOBAL event_scheduler=ON;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex($status = 0)
    {
        $filename = \yii::getAlias('@app').'/web/settings.json';
        $handle = fopen($filename,'r');
        $contents = fread($handle,filesize($filename));
        fclose($handle);
        $json_setting = json_decode($contents,true,16);
        return $this->render('index', [
            'acontent'=>$status,'settings'=>$json_setting
        ]);
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $post = \yii::$app->request->post();
        $db = \yii::$app->db;
        $ts_sdate = $post['ts_sdate'];
        $ts_edate = $post['ts_edate'];
        $ss_sdate = $post['ss_sdate'];
        $ss_edate = $post['ss_edate'];
        $ps_sdate = $post['ps_sdate'];
        $ps_edate = $post['ps_edate'];
        $settings = [
            ['name'=>'this_semester','start_date'=>$ts_sdate,'end_date'=>$ts_edate],
            ['name'=>'student_select','start_date'=>$ss_sdate,'end_date'=>$ss_edate],
            ['name'=>'professor_select','start_date'=>$ps_sdate,'end_date'=>$ps_edate],
        ];
        $sql1 = "DROP EVENT IF EXISTS `e`;";
        $commond = $db->createCommand($sql1);
        $date = date('Y-m-d',strtotime('+1 day',strtotime($ss_edate)));

        $commond->execute();
        $sql2 = "CREATE EVENT `e` ON SCHEDULE AT '" .$date." 0:10:0'".
        "ON COMPLETION NOT PRESERVE DISABLE DO DELETE from cou_pro where cp_num < 4;";
        $commond = $db->createCommand($sql2);
        $commond->execute();
        $json = json_encode($settings);
        $filename = \yii::getAlias('@app').'/web/settings.json';
        $handle = fopen($filename,'w');
        fwrite($handle,$json);
        fclose($handle);
        return $this->redirect(['index','status'=>1]);
    }

}
