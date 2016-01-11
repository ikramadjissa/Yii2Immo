<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */
/* @var $form yii\widgets\ActiveForm */
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="inventorier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codebien')->textInput() ?>

    <?= $form->field($model, 'anneeinv')->textInput() ?>

    <?= $form->field($model, 'comptage1')->textInput() ?>

    <?= $form->field($model, 'comptage2')->textInput() ?>

    <?= $form->field($model, 'comptage3')->textInput() ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bureau')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inventairephysic')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
