<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventorier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codebien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anneeinv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comptage1')->textInput() ?>

    <?= $form->field($model, 'comptage2')->textInput() ?>

    <?= $form->field($model, 'comptage3')->textInput() ?>

    <?= $form->field($model, 'inventairephysic')->textInput() ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bureau')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
