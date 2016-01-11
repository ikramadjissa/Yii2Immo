<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Transfererrefinv */

$this->title = 'Update Transfererrefinv: ' . ' ' . $model->codecomptecomptable;
$this->params['breadcrumbs'][] = ['label' => 'Transfererrefinvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codecomptecomptable, 'url' => ['view', 'codecomptecomptable' => $model->codecomptecomptable, 'dat' => $model->dat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfererrefinv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
