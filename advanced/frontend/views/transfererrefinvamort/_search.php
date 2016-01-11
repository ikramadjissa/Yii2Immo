<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\transfererrefinvamortSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfererrefinvamort-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codecomptecomptable') ?>

    <?= $form->field($model, 'dat') ?>

    <?= $form->field($model, 'codecomptecomptableref') ?>

    <?= $form->field($model, 'mnt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
