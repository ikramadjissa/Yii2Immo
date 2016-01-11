<?php


use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm; 
use yii\data\ActiveDataProvider ;
use yii\widgets\DetailView;
use frontend\models\BienSearch;
use dosamigos\tableexport\ButtonTableExport;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Réforme';
$this->params['breadcrumbs'][] = $this->title;
?>

  <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>  

<legend>Liste des biens proposés à la réforme.</legend>
 </br>
<div class="bien-indexReforme">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

  
<?php 

?>
 </br>
    <?= GridView::widget([
    
       'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
    		
        'columns' => [
         ['class' => 'yii\grid\SerialColumn'],		
         
         
            'codebien',
         
             'désignation',           
             'état',
             
             'date enregistrement',
             'unité', 
            'structure',
            
        ],
    ]); 

 ?>
 
   <p>	
        <?= Html::a('Ajouter bien à la réforme', 
        		
        		['reformer'], ['class' => 'btn btn-primary']) ?>
    </p>
 