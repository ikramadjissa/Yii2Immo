<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\widgets\ActiveForm;
use app\models\Inventorier;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventorierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ecart entre comptages';
$this->params['breadcrumbs'][] = 'Inventaire';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Ecart  entre les comptages.</legend>
<?=Html::beginForm(['inventorier/afficherecartcomptage'],'post');?>

<div class="inventorier-index">
    
    <?= $this->render('_formecartcompt', [
    		
         'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
    ])
    ?>
</div>
 <?= Html::endForm();?>
