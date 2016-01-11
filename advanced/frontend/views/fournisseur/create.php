<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Fournisseur */

$this->title = 'Créer un nouveau fournisseur';
$this->params['breadcrumbs'][] = ['label' => 'Liste des fournisseurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="fournisseur-create">

     <legend>Création d'un nouveau fournisseur</legend>
</br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
