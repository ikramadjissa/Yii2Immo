<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;

$this->title = 'Listes des biens reformes';

$this->params['breadcrumbs'][] = ['label' => 'Reforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = 'Reformes';
?>
  <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        

<legend>Liste des biens réformés</legend>

<?=Html::beginForm(['bien/listereformeenonsortirpatrimoine'],'post');?>
<br />
   <?=Html::submitButton('OK', ['class' =>'btn btn-success']);?>
 
<div class="bien-update">

    <?= $this->render('_formListeReformeNonSortie',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>


 <?= Html::endForm();?>
