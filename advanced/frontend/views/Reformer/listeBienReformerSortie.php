<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use frontend\models\Reformer;

$this->title = 'Listes des biens reformes';

$this->params['breadcrumbs'][] = ['label' => 'Reforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = 'Liste des biens Reformés';
?>

<legend>Liste des biens r��form��s sortis du patrimoine.</legend>


<?=Html::beginForm(['reformer/listereformeesortirpatrimoine'],'post');?>



<br />
   <?=Html::submitButton('Rechercher', ['class' =>'btn btn-primary']);?>
<br /><br />   
<div class="reformer">

    <?= $this->render('_formListeReformeSortie',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>


 <?= Html::endForm();?>
