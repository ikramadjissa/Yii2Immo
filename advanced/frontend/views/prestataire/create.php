<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Prestataire */


$this->title = 'Créer un nouveau préstataire';
$this->params['breadcrumbs'][] = ['label' => 'Liste des préstataires', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

       <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="prestataire-create">

    <legend>Création d'un nouveau préstataire</legend>
</br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
