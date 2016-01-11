<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventorierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventoriers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorier-index">

<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<legend>Afficher le deuxième comptage.</legend>

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
