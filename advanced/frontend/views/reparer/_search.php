<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\ReparerSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="reparer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codebien') ?>

    <?= $form->field($model, 'num_reg') ?>

    <?= $form->field($model, 'idpiecejointe') ?>

    <?= $form->field($model, 'dt') ?>

    <?= $form->field($model, 'numreparation') ?>

    <?php // echo $form->field($model, 'datefin') ?>

    <?php // echo $form->field($model, 'motif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
