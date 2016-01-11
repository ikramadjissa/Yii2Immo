<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\reformeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reformes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reforme-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reforme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'datereforme',
            'refpvreforme',
            'numdecisionreforme',
            'conclusionreforme',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
