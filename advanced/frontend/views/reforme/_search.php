<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\reformeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reforme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'datereforme') ?>

    <?= $form->field($model, 'refpvreforme') ?>

    <?= $form->field($model, 'numdecisionreforme') ?>

    <?= $form->field($model, 'conclusionreforme') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
