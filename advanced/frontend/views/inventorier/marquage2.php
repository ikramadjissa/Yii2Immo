<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\widgets\ActiveForm;
use app\models\Inventorier;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventorierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enregistrer comptage 02';
$this->params['breadcrumbs'][] = 'Inventaire';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Enregistrer le deuxième comptage.</legend>
<?=Html::beginForm(['inventorier/enregistrercomp2'],'post');?>

<div class="inventorier-index">
    <p>
        <?= Html::a('Ajouter bien', ['ajout2'], ['class' => 'btn btn-primary']) ?>
    </p>
    
    <?= $this->render('_formComp2', [
    		
         'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
    ])
    ?>


</div>
 <?= Html::endForm();?>
