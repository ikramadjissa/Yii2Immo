<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\widgets\ActiveForm;
use app\models\Inventorier;
use yii\widgets\Breadcrumbs;



/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventorierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Traitement ecart';
$this->params['breadcrumbs'][] = 'Inventaire';
$this->params['breadcrumbs'][] = $this->title;
?>
  <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Consulter les écarts entre l'inventaire physique et l'inventaire théorique.</legend>
<?=Html::beginForm(['inventorier/extraireecartthph'],'post');?>

<div class="inventorier-index">
    
    <?= $this->render('_formecartPhTh', [
         //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
    ])
    ?>
</div>
 <?= Html::endForm();?>
