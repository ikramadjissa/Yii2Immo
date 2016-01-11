<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */

$this->title = 'Update Inventorier: ' . ' ' . $model->codebien;
$this->params['breadcrumbs'][] = ['label' => 'Inventoriers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codebien, 'url' => ['view', 'id' => $model->codebien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventorier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
