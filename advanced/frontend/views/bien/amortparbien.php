<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use yii\bootstrap\Nav;


$this->title = "Amortissements d'un bien";

$this->params['breadcrumbs'][] = ['label' => 'Comptabilite', 'url' => ['bien/comptabilite']];
$this->params['breadcrumbs'][] = 'Amortissements';
$this->params['breadcrumbs'][] = 'Amortissement par bien';
?>
 
<?=Html::beginForm(['bien/amortbien'],'post');?>

<div class="bien-update">

    <?= $this->render('_formAmortbien',
    		 [
    		'searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,
    		]) ?>
</div>

<?= Html::endForm();?>
 

 
 

 