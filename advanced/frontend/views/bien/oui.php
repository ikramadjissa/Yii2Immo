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


<?=Html::beginForm(['bien/listenouvelleacquiaffect'],'post');?>



<div>

    <?=  $this->render('_listNouvelAcquiAff', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			//'dat' => $dat,
    		    'datAff' => $datAff,
    		    'bureau'=>$bureau,
    		    'affect'=>$affect,
    		
    			]); ?>
</div>


 <?= Html::endForm();?>
 

