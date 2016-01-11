

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use frontend\models\Reformer;

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
'designation bien',
   		'date acquisition','actif brut','amortissement pratiquee','valeur nette',
   		'prix cession','plus value','moins value'
   		
			
            
        ],
    ]); 
 ?>
   <br />
    

    <?php ActiveForm::end(); ?>
</div>