<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;

$this->title = 'Valider biens réformés ';

$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = 'Valider';
?>
  <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Valider les biens proposés à la réforme.</legend>

<?=Html::beginForm(['bien/valider'],'post');?>

<div class="bien-update">

    <?= $this->render('_formValider',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>


 <?= Html::endForm();?>
 

 
 

 