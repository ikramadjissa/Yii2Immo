

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use yii\bootstrap\Nav;
use frontend\models\Bien;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Bien */
/* @var $form yii\widgets\ActiveForm */
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
  
<div class="bien-formAmort">
 
    <?php $form = ActiveForm::begin(); ?>
    
        <?= $form->field($model, 'codebien');?>
    
      <div class="col-lg-01">
     <label class=" control-label"> Designation : </label>
                        <label class="control-label col-lg-offset-1" ><?= $model->designationbien ?> </label>       
    </br> 
      <label class=" control-label">Durée de vie : </label>
                        <label class="control-label col-lg-offset-1" ><?= $model->dureevie." ans" ?> </label> 
                         </br>  </br> 
    </div>
    
   <?= GridView::widget([ 
           'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
   		'showFooter'=>TRUE,
   		'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
         'columns' => [
     		 [
            'class' => 'yii\grid\SerialColumn'
             ],
                
          'année exercice',
            'valeur brute',
            'dotation',
            'amortissements cumulés',
 		     'valeur nette',
                     
        ],

    ]); 
 ?>
   <br />
<?=Html::submitButton('Rechercher', ['class' =>'btn btn-primary']);?>
<br />
    

    <?php ActiveForm::end(); ?>
</div>