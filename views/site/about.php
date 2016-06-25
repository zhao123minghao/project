<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'About Me';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = $user_type;
?>
<div class="site-about">
    <h1><?= Html::encode('Modify Password') ?></h1>

    <p>
        Here you can change your password:
    </p>
    <div class="col-sm-offset-4">
    <div class="password-form">
        <?php $form = ActiveForm::begin(['action'=>Url::to([('site/pass')]),
            /*'options'=>['class'=>'form']*/]); ?>
        <div class="form-group">
            <?= Html::label('old password:')?>
            <?= Html::passwordInput('old',null,[])?>
        </div>
        <div class="form-group">
            <?= Html::label('new password:')?>
            <?= Html::passwordInput('new',null,[])?>
        </div>
        <div class="form-group">
            <?= Html::label('confirm password:')?>
            <?= Html::passwordInput('confirm',null,[])?>
        </div>
        <div class="form-group">
            <?= Html::submitButton( 'Submit', ['class' => 'btn btn-success']) ?>
            <p class="text-danger"><?= $acontent ?></p>
        </div>

    </div>
    </div>
</div>
</script>