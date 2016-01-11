<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use yii\bootstrap\Nav;




$this->title = 'Etat des immobilisations';

$this->params['breadcrumbs'][] = ['label' => 'Comptabilite', 'url' => ['bien/comptabilite']];
$this->params['breadcrumbs'][] = 'Amortissements';
$this->params['breadcrumbs'][] = 'Etat des immobilisations';
?>

 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
                <legend>Amortissements des biens par compte</legend>
        
<?=Html::beginForm(['bien/etatimmobien'],'post');?>

<div class="bien-update">

    <?= $this->render('_formEtatmmo',
    		 [
    		'searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,
    		]) ?>
</div>

<?= Html::endForm();?>
 

 
 

 