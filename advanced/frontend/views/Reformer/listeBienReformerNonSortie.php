<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use frontend\models\Reformer;
use yii\widgets\Breadcrumbs;

$this->title = 'Listes des biens réformes';

$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = 'Liste des biens Reformés';

?>
   <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Liste des biens réformés.</legend>


<?=Html::beginForm(['reformer/listereformeenonsortirpatrimoine'],'post');?>
<br />
   <?=Html::submitButton('Rechercher', ['class' =>'btn btn-primary']);?>
<br />
   
<div class="reformer">

    <?= $this->render('_formListeReformeNonSortie',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>

 <?= Html::endForm();?>
