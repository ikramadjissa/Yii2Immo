<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm; 
use yii\data\ActiveDataProvider ;
use yii\widgets\DetailView;
use frontend\models\BienSearch;
use frontend\models\Intervenant;
use frontend\models\IntervenantSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reforme';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=Html::beginForm(['reformer/sortirbiencede'],'post');?>
<br />
<br />
   <?=Html::submitButton('Suivant', ['class' =>'btn btn-success']);?>
<br />
<p>
</p>
<div class="bien-update">
<?= $this->render(' _formsortirbiencession',
    		 ['searchModel' => $searchModel,
 	   		  'dataProvider' => $dataProvider,
 	   		  'model' => $model,])?>
</div>
 <?= Html::endForm();?>
  <?=Html::beginForm(['intervenant/index'],'post');?>
<br />
<br />
   <?=Html::submitButton('Commisaire priseur', ['class' =>'btn btn-success']);?>
   
    <?= Html::endForm();?>