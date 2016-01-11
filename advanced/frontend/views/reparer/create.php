<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Reparer */

$this->title = 'Créer une fiche de réparation';
$this->params['breadcrumbs'][] = ['label' => 'Liste des fiches de réparations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="reparer-create">

    <legend>Fiche de réparation</legend>
</br>

    <?= $this->render('_form', [
        'model' => $model,
    		'dat'=>$dat,
    ]) ?>

</div>
