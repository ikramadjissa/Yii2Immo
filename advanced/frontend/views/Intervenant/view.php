<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Intervenant */

$this->title = $model->idintervenant;
$this->params['breadcrumbs'][] = ['label' => 'Intervenants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervenant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idintervenant], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idintervenant], [
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
            'typeinter',
            'titre',
            'adresse',
            'mail',
            'tel',
            'idintervenant',
        ],
    ]) ?>

</div>
