

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use frontend\models\Reformer;
use yii\widgets\Breadcrumbs;



/* @var $this yii\web\View */
/* @var $model app\models\Bien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-formValider">

    <?php $form = ActiveForm::begin(); ?>
    <br />
    <?= $form->field($model, 'anneeRef' ) ?> 
    
   <?= $form->field($model, 'typereforme')->dropDownList( ['Cession','Don', 'Mise au rebut', 'Perdu'],['prompt'=>'------------ ']);
    		?>
        		
<br />
<?php 

/*
echo ButtonTableExport::widget([
		[
		'label' => 'Export Table Grid',
		'selector' => '#my-grid-id > table',
		'split' => true,
		'exportClientOptions' => [
		'ignoredColumns' => [0, 7], // lets ignore some columns
		'useDataUri' => true,
		]
		]
		]);
		*/
?>
   <?= GridView::widget([ 
    
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
         'columns' => [
	 ['class' => 'yii\grid\SerialColumn'],
		 		
'codebien',
'designation bien',
'type reforme',
'date reforme',
			
            
        ],
    ]); 
 ?>
   <br />
    

    <?php ActiveForm::end(); ?>
</div>