<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['indexReforme'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codebien') ?>

     <?php // echo $form->field($model, 'codesousfamille') ?>

     <?php // echo $form->field($model, 'numfacture') ?>

     <?php // echo $form->field($model, 'numcmd') ?>

     <?php // echo $form->field($model, 'typebien') ?>

    <?php  echo $form->field($model, 'designationbien') ?>

    <?php // echo $form->field($model, 'dateacquisition') ?>

    <?php // echo $form->field($model, 'statutbien') ?>

     <?php // echo  echo $form->field($model, 'etatbien') ?>

    <?php // echo $form->field($model, 'prixachat') ?>

    <?php // echo $form->field($model, 'tauxamort') ?>

    <?php // echo $form->field($model, 'typeamort') ?>

    <?php // echo $form->field($model, 'dureevie') ?>

    <?php // echo $form->field($model, 'commentaire') ?>

    <?php // echo $form->field($model, 'poids') ?>

    <?php // echo $form->field($model, 'garantie') ?>

    <?php // echo $form->field($model, 'datedebugarantie') ?>

    <?php  echo $form->field($model, 'dateenr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
