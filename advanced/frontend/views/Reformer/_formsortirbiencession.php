<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;

/* @var $this yii\web\View */
/* @var $model app\models\Bien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-formAmort">

    <?php $form = ActiveForm::begin(); ?>
    
      <?= $form->field($model, 'prixvente') ?> 
    
   <?= GridView::widget([
    
       'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
        'columns' => [
     //    ['class' => 'yii\grid\SerialColumn'],		
           'comptecomptable',
            'codebien',
            'designationbien',
            'typereforme',
            'prixvente',
            'dateRef',
['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); 
?>    


 
    <?php ActiveForm::end(); ?>
</div>