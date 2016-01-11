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

$this->title = 'Sortir autre réforme';
$this->params['breadcrumbs'][] = ['label' => 'Comptabilité', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = "Sortir autres biens réformés";
?>

   <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Sortir autres biens réformés du patrimoine (Perdu, Mise au rebut...).</legend>


<?=Html::beginForm(['reformer/sortirbienautre'],'post');?>
   <?=Html::submitButton('Enregisrer', ['class' =>'btn btn-primary']);?>
<br />
   
<br />
<div class="bien-update">
<?= $this->render('_formsortirbienAutre',
    		 ['searchModel' => $searchModel,
 	   		  'dataProvider' => $dataProvider,
 	   		  'model' => $model,])?>
</div>

<br />

<?= Html::endForm();?>
 