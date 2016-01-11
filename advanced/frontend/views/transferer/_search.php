<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\TransfererSearch */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="transferer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codebien') ?>

    <?= $form->field($model, 'motif') ?>

    <?= $form->field($model, 'dt') ?>

    <?= $form->field($model, 'codebureau') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
