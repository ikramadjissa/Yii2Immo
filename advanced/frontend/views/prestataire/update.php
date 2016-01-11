<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Prestataire */

$this->title = "Modification";
$this->params['breadcrumbs'][] = ['label' => 'Liste des prestataires', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Fiche du préstataire numéro $model->num_reg", 'url' => ['view', 'id' => $model->num_reg]];
$this->params['breadcrumbs'][] = "Modification";
?>

<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="prestataire-update">

    <h3>Modification de la fiche du préstataire</h3 >
</br></br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
