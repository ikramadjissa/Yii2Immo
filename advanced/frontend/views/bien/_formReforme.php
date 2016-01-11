<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\Reforme;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'codebien')?>
    <?php //= $form->field($model, 'dateenr') ?>
     <div>
                     <?= $form->field($model, 'dateenr')->widget(
                                 DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                'clientOptions' => [
                                                  'autoclose' => true,                                 
                                                   'format' => 'dd/mm/yyyy'
                                                           ]
                                                   ])?>
                   </div>
    
    <?php //= $form->field($model, 'file' )->fileInput(); ?>
     
</br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enregistrer' : 'Enregistrer', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
