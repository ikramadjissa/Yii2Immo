<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Bien */

$this->title = 'Nouvelle acquisiton';
$this->params['breadcrumbs'][] = ['label' => 'Liste des biens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
 <div class="bien-create">

 <h1><?= Html::encode($this->title) ?></h1>    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

   