<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Prestataire */


$this->title = "Fiche de prestataire";
$this->params['breadcrumbs'][] = ['label' => 'Liste des prestataires', 'url' => ['index']];
$this->params['breadcrumbs'][] =  "Fihe de prestataire numéro $model->num_reg";
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="prestataire-view">

    <h3><?= Html::encode($this->title) ?></h3>

    </br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'num_reg',
            'designation',
            'natureprestation',
            'adresse',
            'tel',
            'fax',
            'email:email',
           
        ],
    ]) ?>
    </br>
    <p class="col-lg-offset-5">
        <?= Html::a('Modifier', ['update', 'id' => $model->num_reg], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->num_reg], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Voulez-vous vraiment supprimer ce prestataire?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

