<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;



/* @var $this yii\web\View */
/* @var $model frontend\models\Intervenant */

$this->title = 'Ajouter commissaire priseur ';
$this->params['breadcrumbs'][] = ['label' => 'Commissaire priseur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<legend>   Ajouter un nouveau commissaire priseur </legend>
<div class="intervenant-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
