<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;





$this->title = 'Journal global';

$this->params['breadcrumbs'][] = ['label' => 'Comptabilite', 'url' => ['bien/comptabilite']];
$this->params['breadcrumbs'][] = 'Amortissements';
$this->params['breadcrumbs'][] = 'Journal globale';
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <legend>Journale global</legend>
        
<?=Html::beginForm(['bien/journalglobale'],'post');?>

<div class="bien-update">

    <?= $this->render('_formJournalGlob',
    		 [
    		'searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,
    		]) ?>
</div>

<?= Html::endForm();?>
 

 
 

 