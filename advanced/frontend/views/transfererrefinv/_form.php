<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Transfererrefinv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfererrefinv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codecomptecomptable')->textInput() ?>

    <?= $form->field($model, 'codecomptecomptableref')->textInput() ?>

    <?= $form->field($model, 'dat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mnt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
