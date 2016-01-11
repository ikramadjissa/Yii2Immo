<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\transfererrefinvamort */

$this->title = 'Update Transfererrefinvamort: ' . ' ' . $model->codecomptecomptable;
$this->params['breadcrumbs'][] = ['label' => 'Transfererrefinvamorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codecomptecomptable, 'url' => ['view', 'codecomptecomptable' => $model->codecomptecomptable, 'dat' => $model->dat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfererrefinvamort-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
