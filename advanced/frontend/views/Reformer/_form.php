<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reformer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reformer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codebien')->textInput() ?>

    <?= $form->field($model, 'titre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typereforme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datereforme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prixvente')->textInput() ?>

    <?= $form->field($model, 'booleann')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
