<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Bien */

$this->title = $model->codebien;
$this->params['breadcrumbs'][] = ['label' => 'Biens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<div class="bien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->codebien], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->codebien], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
    		
        'attributes' => [
            'codebien',
            'codesousfamille',
            'numfacture',
            'numcmd',
            'typebien',
            'designationbien',
            'dateacquisition',
            'statutbien',
            'etatbien',
            'prixachat',
            'tauxamort',
            'typeamort',
            'dureevie',
            'commentaire',
            'poids',
          
            'datedebugarantie',
        ],
    ]) ?>

</div>
