<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use yii\filters\VerbFilter;
use app\models\InstanceSearch;
use yii\widgets\Breadcrumbs;
?>

<?=Html::beginForm(['bien/listeaffecter'],'post');?>



<div>

    <?= $this->render('listeBienAaffecter',
    		 ['searchInstance' => $searchInstance,
 	   		'dataProvider' => $dataProvider,
    		'affect' => $affect,
    	 	    		'dat' => $dat,
    	 	    		//'model' => $model,
    	 	    		'bureau' => $bureau,]) ?>
</div>


 <?= Html::endForm();?>
 

