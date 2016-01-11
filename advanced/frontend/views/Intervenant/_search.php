<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IntervenantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervenant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'typeinter') ?>

    <?= $form->field($model, 'titre') ?>

    <?= $form->field($model, 'adresse') ?>

    <?= $form->field($model, 'mail') ?>

    <?= $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'idintervenant') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
