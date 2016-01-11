

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
    
    
   <?= GridView::widget([ 
    
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
         'columns' => [
		 ['class' => 'yii\grid\SerialColumn'],
		 		
             'codebien',
             'designationbien',
             'dateacquisition',
             'actifbrut',
             'tauxamort',
             'amortpratiquee',
   		     'valeurnet',
   					 			             
        ],

    ]); 
 ?>
   <br />
<?=Html::submitButton('Enregistrer', ['class' =>'btn btn-success']);?>
<br />
    

    <?php ActiveForm::end(); ?>
</div>