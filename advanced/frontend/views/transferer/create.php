<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Transferer */

$this->title = 'Create Transferer';
$this->params['breadcrumbs'][] = ['label' => 'Transferers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 

<div class="transferer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
