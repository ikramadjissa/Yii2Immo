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
    <?= $form->field($model, 'bureau')->textInput(['maxlength' => true]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'ajout2', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
