<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model frontend\models\Bien */
?>
<?php
$this->title = 'Réformer bien';
?>

 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        

<legend>Ajouter bien à la réforme</legend>
<?php

$this->params['breadcrumbs'][] = ['label' => 'Réforme', 'url' => ['bien/indexrefo']];
$this->params['breadcrumbs'][] = 'Ajouter bien';
?>
<div class="bien-Reformer">
    <?= $this->render('_formReforme', [
        'model' => $model,
    		
    ])?>
</div>
