<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\reforme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reforme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datereforme')->textInput() ?>

    <?= $form->field($model, 'refpvreforme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numdecisionreforme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conclusionreforme')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
