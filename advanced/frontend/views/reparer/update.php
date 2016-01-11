<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Reparer */

$this->title = "Modification";
$this->params['breadcrumbs'][] = ['label' => 'Liste des fiches de réparations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Fiche de réparation du bien $model->codebien", 'url' => ['view', 'codebien' => $model->codebien, 'num_reg' => $model->num_reg,  'dt' => $model->dt]];
$this->params['breadcrumbs'][] = "Modification";

?>
  <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="reparer-update">
</br>
    <h3>Modification de la fiche de réparation</h3 >
</br>
    <?= $this->render('_form', [
        'model' => $model,
    		'dat'=>$dat,
    ]) ?>

</div>
