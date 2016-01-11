<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\BienSearch */
/* @var $form yii\widgets\ActiveForm */
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<div class="bien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codebien') ?>

    <?= $form->field($model, 'codesousfamille') ?>

    <?= $form->field($model, 'numfacture') ?>

    <?= $form->field($model, 'numcmd') ?>

    <?= $form->field($model, 'typebien') ?>

    <?php // echo $form->field($model, 'designationbien') ?>

    <?php // echo $form->field($model, 'dateacquisition') ?>

    <?php // echo $form->field($model, 'statutbien') ?>

    <?php // echo $form->field($model, 'etatbien') ?>

    <?php // echo $form->field($model, 'prixachat') ?>

    <?php // echo $form->field($model, 'tauxamort') ?>

    <?php // echo $form->field($model, 'typeamort') ?>

    <?php // echo $form->field($model, 'dureevie') ?>

    <?php // echo $form->field($model, 'commentaire') ?>

    <?php // echo $form->field($model, 'poids') ?>

    <?php // echo $form->field($model, 'garantie') ?>

    <?php // echo $form->field($model, 'datedebugarantie') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
