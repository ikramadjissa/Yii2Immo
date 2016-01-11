<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Reformer */

$this->title = 'Create Reformer';
$this->params['breadcrumbs'][] = ['label' => 'Reformers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reformer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
