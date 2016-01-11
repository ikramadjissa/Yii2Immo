

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

<div class="bien-formValider">

    <?php $form = ActiveForm::begin(); ?>
    
          <?= $form->field($model, 'anneeRef' ) ?> 
        		
<br />

   <?= GridView::widget([ 
    
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
         'columns' => [
	 ['class' => 'yii\grid\SerialColumn'],
		 		
'codebien',
'designationbien',
'typereforme',
'dateRef',
			
            
        ],
    ]); 
 ?>
   <br />
    

    <?php ActiveForm::end(); ?>
</div>