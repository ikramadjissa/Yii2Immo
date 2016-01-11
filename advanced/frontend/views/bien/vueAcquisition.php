<?php 
use kartik\tabs\TabsX;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widjets\Pjax;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
?>


<?=Html::beginForm(['bien/acquisition'],'post');?>

         
<div>

    <?= $this->render('_formAcquisition', ['model' => $model,
    				
				'soufamille' =>$soufamille,
				'dat'=>$dat,
				'cmd'=>$cmd,
				'fact'=>$fact,
    		      'fourn'=>$fourn,
    				]) ?>
</div>


 <?= Html::endForm();?>