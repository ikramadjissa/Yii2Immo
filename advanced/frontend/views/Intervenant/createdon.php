<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Intervenant */

$this->title = 'Ajouter unite';
$this->params['breadcrumbs'][] = ['label' => 'Intervenants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<legend>Ajouter une nouvelle unité.</legend>

<div class="intervenant-create">


    <?= $this->render('_formDon', [
        'model' => $model,
    ]) ?>

</div>
