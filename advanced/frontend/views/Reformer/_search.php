<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ReformerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reformer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codebien') ?>

    <?= $form->field($model, 'titre') ?>

    <?= $form->field($model, 'typereforme') ?>

    <?= $form->field($model, 'datereforme') ?>

    <?= $form->field($model, 'prixvente') ?>

    <?php // echo $form->field($model, 'booleann') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
