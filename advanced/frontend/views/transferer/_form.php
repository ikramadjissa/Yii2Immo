<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Transferer */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="transferer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codebien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codebureau')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Modifier', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
