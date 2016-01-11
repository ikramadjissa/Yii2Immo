

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use yii\bootstrap\Nav;
use frontend\models\Bien;

/* @var $this yii\web\View */
/* @var $model app\models\Bien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-formAmort">
  
    <?php $form = ActiveForm::begin(); ?>
    
   
    
        <?= $form->field($model, 'anneexercice');?>
           <?= $form->field($model, 'comptecomptable');?>
    
   <?= GridView::widget([ 
           'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
   		'showFooter'=>TRUE,
   		'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
         'columns' => [
     		 [
            'class' => 'yii\grid\SerialColumn'],
         //  'comptecomptable',          
            'codebien',
            'designationbien',
            'dateacquisition',
           // 'Duree de vie',
 'dureevie',            
'actifbrut',
        //    'dotation',
           
             'amortpratiquee',
   		     'valeurnet',
            

		             
        ],

    ]); 
 ?>
   <br />
<?=Html::submitButton('Rechercher', ['class' =>'btn btn-primary']);?>
<br />
    

    <?php ActiveForm::end(); ?>
</div>