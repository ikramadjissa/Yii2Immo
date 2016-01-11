<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */

$this->title = 'ajouter un bien à la liste des biens comptés';
$this->params['breadcrumbs'][] = ['label' => 'Inventaire', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorier-create">
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend> ajouter un bien à la liste de comptage 02. </legend>

<?=Html::beginForm(['inventorier/ajout2'],'post');?>
<?= $this->render('_formajout2', [
        'model' => $model,
    ]) ?>
 <?= Html::endForm();?>
</div>
