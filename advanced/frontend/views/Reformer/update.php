<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reformer */

$this->title = 'Update Reformer: ' . ' ' . $model->codebien;
$this->params['breadcrumbs'][] = ['label' => 'Reformers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codebien, 'url' => ['view', 'id' => $model->codebien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reformer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
