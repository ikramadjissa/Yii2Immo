<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */

$this->title = 'Create Inventorier';
$this->params['breadcrumbs'][] = ['label' => 'Inventoriers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
