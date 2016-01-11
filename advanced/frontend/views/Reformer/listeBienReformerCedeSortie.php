<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
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
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Liste des biens réformés cédés.</legend>


<?=Html::beginForm(['reformer/listereformeecedesortirpatrimoine'],'post');?>

<br />
   <?=Html::submitButton('Rechercher', ['class' =>'btn btn-primary']);?>
   <br /><br />
<div class="reformer">

    <?= $this->render('_formListeReformeCedeSortie',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>


 <?= Html::endForm();?>
