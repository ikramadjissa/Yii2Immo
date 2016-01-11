<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use frontend\models\Reformer;

$this->title = 'Listes des biens reformes';

$this->params['breadcrumbs'][] = ['label' => 'Reforme', 'url' => ['reformer/index']];
$this->params['breadcrumbs'][] = 'Liste des biens Reformes';
?>
<?=Html::beginForm(['reformer/listereformeenonsortirpatrimoine'],'post');?>

<div class="reformer">

    <?= $this->render('_formListeReformeNonSortie',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>


 <?= Html::endForm();?>
