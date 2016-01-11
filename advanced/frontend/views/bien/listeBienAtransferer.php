<?php


use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm; 
use yii\data\ActiveDataProvider ;
use yii\widgets\DetailView;
use frontend\models\BienSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Transférer en compte de réforme';
$this->params['breadcrumbs'][] = ['label' => 'Comptabilité', 'url' => ['reformer/listereformeenonsortirpatrimoine']];
$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['reformer/listereformeenonsortirpatrimoine']];
$this->params['breadcrumbs'][] = "Transférer coûts investissements";
?>

 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        

<legend>Transférer coûts d'investissement des biens réformés vers des comptes de réforme.</legend>

<?=Html::beginForm(['bien/listcompteatrensferer'],'post');?>

<div class="bien-update">

    <?= $this->render('_formbienatransferer',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>


 <?= Html::endForm();?>

 
 
 