<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ReformerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reformers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reformer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reformer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
            'titre',
            'typereforme',
            'datereforme',
            'prixvente',
            // 'booleann',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
