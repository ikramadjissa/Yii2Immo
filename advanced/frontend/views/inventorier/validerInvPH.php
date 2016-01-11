<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\widgets\ActiveForm;
use app\models\Inventorier;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventorierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Traiter ecarts comptages';
$this->params['breadcrumbs'][] = 'Inventaire';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Valider l'inventaire physique.</legend>
<?=Html::beginForm(['inventorier/validerinvph'],'post');?>

<div class="inventorier-index">
   
    
    <?= $this->render('_formValiderInvPH', [
    		
         
            'model' => $model,
    ])
    ?>

  

</div>
 <?= Html::endForm();?>
