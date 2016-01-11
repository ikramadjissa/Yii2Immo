<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Intervenant */
/* @var $form yii\widgets\ActiveForm */
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <legend>Ajouter une nouvelle unité.</legend>
        
<div class="intervenant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'typeinter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adresse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'idintervenant')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Creer' : 'Creer', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
