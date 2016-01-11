<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransfererSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Liste des navettes';
$this->params['breadcrumbs'][] = $this->title;
?>
 
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="transferer-index">
  </br>
    <h3><?= Html::encode($this->title) ?></h3>
    </br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         'codebien',
          'codebureau',
          'dt',
           'motif',

            ['class' => 'yii\grid\ActionColumn',
              'template' => '{view}{update}'],
        ],
    ]); ?>

</div>
