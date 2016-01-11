

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
    
     <div class="col-lg-12">
   <label  class="col-lg-2 control-label">Annee d'exercice:</label>
     <div class= "col-lg-8">
            <?= $form->field($model, 'anneexercice')->label(false);?>
     </div>
     <div class= "col-lg-2">
          <?=Html::submitButton('Rechercher', ['class' =>'btn btn-primary ']);?>
        </div>
   </div>
    
    
   <?= GridView::widget([ 
           'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
   		'showFooter'=>TRUE,
   		'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
         'columns' => [
     		 [
            'class' => 'yii\grid\SerialColumn'],
           'compte comptable',          
            'designation compte',
            'valeur brute',
           // 'dotation',
            'amortissements cumulés',
 		     'valeur nette',
                     
        ],

    ]); 
 ?>
   <br />

<br />
    

    <?php ActiveForm::end(); ?>
</div>