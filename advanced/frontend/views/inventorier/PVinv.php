<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\widgets\ActiveForm;
use frontend\models\Inventorier;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventorierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Traiter ecarts comptages';
$this->params['breadcrumbs'][] = 'Inventaire';
$this->params['breadcrumbs'][] = $this->title;
?>
<legend>Régler les ecarts entre les deux comptages.</legend>
<?=Html::beginForm(['inventorier/traiterecartcomptage'],'post');?>

<div class="inventorier-index">
    <p>
        <?= Html::a('Ajouter bien', ['ajout'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= $this->render('_formTraitEcartComp', [
    		
         'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
    ])
    ?>

  

</div>
 <?= Html::endForm();?>
