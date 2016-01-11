<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransfererrefinvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => 'Reforme', 'url' => ['reformer/listereformeenonsortirpatrimoine']];
$this->params['breadcrumbs'][] = "Liste comptes d'attente des investissements";
?>
  <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend> Liste comptes d'attentes des investissements.</legend>
<div class="transfererrefinv-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codecomptecomptable',
            'codecomptecomptableref',
            'dat',
            'mnt',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
