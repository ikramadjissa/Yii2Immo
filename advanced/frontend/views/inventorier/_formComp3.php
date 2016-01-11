<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventorier-form">

    <?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    

<div class="col-lg-01">
     <label class=" control-label">Année inventaire : </label>
                        <label class="control-label col-lg-offset-1" ><?= date('Y') ?> </label>       
    </br> </br> </br>    
    <?= $form->field($model, 'codestructure')->textInput(['maxlength' => true]) ?>
   <label class=" control-label">Désignation structure : </label>
                        <label class="control-label col-lg-offset-1" ><?= $model->designationstructure ?> </label> 
    </div>
  </br>
  </br>
   
  <?= GridView::widget([
       
          //  'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
            'designation',
            'bureau',
            'etat',
           ['class' => 'yii\grid\CheckboxColumn'],

        ],
    ]); ?>
    <br />
    
<?=Html::submitButton('Enregistrer', ['class' =>'btn btn-primary']);?>
<br />
    
    <?php ActiveForm::end(); ?>

</div>
