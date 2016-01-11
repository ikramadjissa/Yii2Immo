<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\transfererrefinvamort */

$this->title = 'Create Transfererrefinvamort';
$this->params['breadcrumbs'][] = ['label' => 'Transfererrefinvamorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfererrefinvamort-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
