<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Transfererrefinv */

$this->title = $model->codecomptecomptable;
$this->params['breadcrumbs'][] = ['label' => 'Transfererrefinvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfererrefinv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'codecomptecomptable' => $model->codecomptecomptable, 'dat' => $model->dat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'codecomptecomptable' => $model->codecomptecomptable, 'dat' => $model->dat], [
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
            'codecomptecomptable',
            'codecomptecomptableref',
            'dat',
            'mnt',
        ],
    ]) ?>

</div>
