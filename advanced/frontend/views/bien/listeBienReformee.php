<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm; 
use yii\data\ActiveDataProvider ;
use yii\widgets\DetailView;
use frontend\models\BienSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reforme';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bien-indexReforme">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
   
    <?= GridView::widget([
    
       'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
         ['class' => 'yii\grid\SerialColumn'],		
        
            'codebien',
             'designationbien',
             'typereforme',
             'dateRef',
        ],
    ]); 

 ?>
 
 
 