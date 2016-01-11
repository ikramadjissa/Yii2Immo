<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reformer */

$this->title = $model->codebien;
$this->params['breadcrumbs'][] = ['label' => 'Reformers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reformer-view">

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
            'titre',
            'typereforme',
            'datereforme',
            'prixvente',
            'booleann',
        ],
    ]) ?>

</div>
