<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\reforme */

$this->title = 'Update Reforme: ' . ' ' . $model->datereforme;
$this->params['breadcrumbs'][] = ['label' => 'Reformes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->datereforme, 'url' => ['view', 'id' => $model->datereforme]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reforme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
