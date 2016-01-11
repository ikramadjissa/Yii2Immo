<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Fournisseur */
?>

<?php
$this->title = "Fiche de fournisseur";
$this->params['breadcrumbs'][] = ['label' => 'Liste des fournisseurs', 'url' => ['index']];
$this->params['breadcrumbs'][] =  "Fihe de fournisseur numéro $model->regcomm";
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<div class="fournisseur-view">

    <h3><?= Html::encode($this->title) ?></h3>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'regcomm',
            'designation',
            'adressfourn',
            'telfourn',
            'fax',
        ],
    ]) ?>
    
    
     </br>
    <p class="col-lg-offset-5">
        <?= Html::a('Modifier', ['update', 'id' => $model->regcomm], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimmer', ['delete', 'id' => $model->regcomm], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Voulez-vous vraiment supprimer ce fournisseur?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
