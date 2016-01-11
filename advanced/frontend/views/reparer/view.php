<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Reparer */

$this->title = "Fiche de réparation";
$this->params['breadcrumbs'][] = ['label' => 'Liste des fiches de réparations', 'url' => ['index']];
$this->params['breadcrumbs'][] =  "Fihe de réparation du bien $model->codebien";
?>

 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="reparer-view">

    <h3><?= Html::encode($this->title) ?></h3>

   </br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
              'numreparation',            
              'codebien',
            'num_reg',
           
            'dt',
            
            'datefin',
            'motif',
        ],
    ]) ?>

</div>
 <p>
        <?= Html::a('Modifier', ['update', 'codebien' => $model->codebien, 'num_reg' => $model->num_reg,  'dt' => $model->dt], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'codebien' => $model->codebien, 'num_reg' => $model->num_reg, 'dt' => $model->dt], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Voulez-vous vraiment supprimer cette fiche de réparation?',
                'method' => 'post',
            ],
        ]) ?>
    </p>