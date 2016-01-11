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
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sortir biens cédés';
$this->params['breadcrumbs'][] = ['label' => 'Comptabilité', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = "Sortir les biens cédés";
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Sortir les biens cédés du patrimoine.</legend>

<?=Html::beginForm(['reformer/sortirbiencede'],'post');?>
<br />

   <?=Html::submitButton('Enregistrer prix cession', ['class' =>'btn btn-primary']);?>
   
<br />
<br />
<div class="bien-update">
<?= $this->render('_formsortirbiencession',
    		 ['searchModel' => $searchModel,
 	   		  'dataProvider' => $dataProvider,
 	   		  'model' => $model,])?>
</div>
 <?= Html::endForm();?>
 <?=Html::beginForm(['intervenant/index'],'post');?>
<br />
<br />
   <?=Html::submitButton('Commisaire priseur', ['class' =>'btn btn-primary']);?>
   
    <?= Html::endForm();?>