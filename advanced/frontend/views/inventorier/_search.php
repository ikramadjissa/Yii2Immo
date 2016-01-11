<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\InventorierSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventorier-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codebien') ?>

    <?= $form->field($model, 'anneeinv') ?>

    <?= $form->field($model, 'comptage1') ?>

    <?= $form->field($model, 'comptage2') ?>

    <?= $form->field($model, 'comptage3') ?>

    <?php // echo $form->field($model, 'obs') ?>

    <?php // echo $form->field($model, 'bureau') ?>

    <?php // echo $form->field($model, 'inventairephysic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
