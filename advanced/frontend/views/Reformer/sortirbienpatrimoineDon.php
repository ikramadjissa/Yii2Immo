<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm; 
use yii\data\ActiveDataProvider ;
use yii\widgets\DetailView;
use app\models\BienSearch;
use app\models\Intervenant;
use app\models\IntervenantSearch;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reforme';
$this->params['breadcrumbs'][] = ['label' => 'Comptabilité', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = "Sortir les biens dons";
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Sortir les biens dons du patrimoine.</legend>


<?=Html::beginForm(['reformer/sortirbiendon'],'post');?>
   <?=Html::submitButton('Enregisrer', ['class' =>'btn btn-primary']);?>

<br />
   
<br />
<div class="bien-update">
<?= $this->render('_formsortirbienDon',
    		 ['searchModel' => $searchModel,
 	   		  'dataProvider' => $dataProvider,
 	   		  'model' => $model,])?>
</div>
<br />

<?= Html::endForm();?>

<?=Html::beginForm(['intervenant/creunite'],'post');?>

<br />
   <?=Html::submitButton('Ajouter unite', ['class' =>'btn btn-primary']);?>
   
    <?= Html::endForm();?>



 