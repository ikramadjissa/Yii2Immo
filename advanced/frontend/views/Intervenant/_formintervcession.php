<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Intervenant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervenant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idintervenant')->textInput() ?>

    <?= $form->field($model, 'typeinter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adresse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
