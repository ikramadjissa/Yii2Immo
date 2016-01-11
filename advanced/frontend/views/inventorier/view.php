<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */

$this->title = $model->codebien;
$this->params['breadcrumbs'][] = ['label' => 'Inventoriers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorier-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->codebien], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->codebien], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codebien',
            'anneeinv',
            'comptage1',
            'comptage2',
            'comptage3',
            'obs',
            'bureau',
            'inventairephysic',
        ],
    ]) ?>

</div>
