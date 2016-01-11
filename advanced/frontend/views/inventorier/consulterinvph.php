<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventorierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventaire';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorier-index">
<?= $this->render('men');?>

        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>Inventaire physique.</legend>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
            'designation',
             'bureau',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
<?=Html::beginForm(['inventorier/validerinvph'],'post');?>

<br />
<?=Html::submitButton('Valider', ['class' =>'btn btn-primary']);?>
<br />
 <?= Html::endForm();?>
</div>
