<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Intervenant */

$this->title = 'Update Intervenant: ' . ' ' . $model->idintervenant;
$this->params['breadcrumbs'][] = ['label' => 'Intervenants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idintervenant, 'url' => ['view', 'id' => $model->idintervenant]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="intervenant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
