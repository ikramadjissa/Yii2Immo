<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\transfererrefinvamort */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfererrefinvamort-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codecomptecomptable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codecomptecomptableref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mnt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
