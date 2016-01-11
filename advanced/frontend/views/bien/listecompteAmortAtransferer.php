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


$this->title = 'Reforme';
$this->params['breadcrumbs'][] = ['label' => 'Comptabilité', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = "Transférer amortissements cumulés";
?>

<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Transférer amortissements cumulés vers des comptes de réforme.</legend>
<?=Html::beginForm(['bien/transferercompteamort'],'post');?>

<div class="bien-update">

    <?= $this->render('_formTransfererAmortissementReforme',
    		 ['searchModel' => $searchModel,
 	   		'dataProvider' => $dataProvider,
 	   		'model' => $model,]) ?>
</div>

 <?= Html::endForm();?>

 
 
 