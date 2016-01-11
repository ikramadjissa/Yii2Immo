<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;

$this->title = 'Valider biens reformer ';

$this->params['breadcrumbs'][] = ['label' => 'Comptabilite', 'url' => ['bien/comptabilite']];
$this->params['breadcrumbs'][] = 'Reforme';
$this->params['breadcrumbs'][] = 'Consultation des amortissements';
?>

<?=Html::beginForm(['bien/amortissement'],'post');?>

<div class="bien-update">

    <?= $this->render('_formAmortissementReforme',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>

<?= Html::endForm();?>
 

 
 

 