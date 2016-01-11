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

    <?php $form = ActiveForm::begin([]); ?>
    
   <div class="col-lg-01">
     <label class=" control-label">Annèe inventaire : </label>
                        <label class="control-label col-lg-offset-1" ><?= date('Y') ?> </label>       
    </br>
  
      <br />
  <?= GridView::widget([
       
          //  'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
            'designation',
            'etat',
            'bureau',
            'statutbien',

//['class' => 'yii\grid\CheckboxColumn'],
        ],

    ]); ?>
    
</br> 
      <label class=" control-label">Nombre totale des biens non inventoriés : </label>
                        <label class="control-label col-lg-offset-1" ><?= $model->ecarttotal ?> </label> 
<br />
    
    <?php ActiveForm::end(); ?>

</div>
