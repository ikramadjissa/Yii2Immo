<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Fournisseur */


$this->title = "Modification";
$this->params['breadcrumbs'][] = ['label' => 'Liste des fournisseurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Fiche du fournisseur numéro $model->regcomm", 'url' => ['view', 'id' => $model->regcomm]];
$this->params['breadcrumbs'][] = "Modification";
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="fournisseur-update">

     <h3>Modification de la fiche du fournisseur</h3 >
</br></br>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
