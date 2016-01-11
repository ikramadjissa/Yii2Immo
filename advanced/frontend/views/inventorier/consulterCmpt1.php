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
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="inventorier-index">



<legend>Afficher le premier comptage.</legend>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
            'designation',
           // 'anneeinv',
           // 'comptage1',
            //'comptage2',
            //'comptage3',
            // 'obs',
             'bureau',
            // 'inventairephysic',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
