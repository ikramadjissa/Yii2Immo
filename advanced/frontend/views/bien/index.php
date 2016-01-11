<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widjets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biens';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<div class="bien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
 <?= Html::SubmitButton( 'Enregistrer bien', ['value' => Url::to('index.php?r=bien/try') , 'class' => 'btn btn-success', 'id'=> 'modelAcquiButton']) ?>  
    <p>
        
    </p>
  
  <?php 
  Modal::Begin([
  'header' => '<h4> Affectation ou mise en instance </h4>',
  'id' => 'modalAffect',
  'size' => 'modal-lg',
  ]);
  
 
  echo "<div id='modalContent'>	
		
		</div>";
  
  Modal::end();
  ?>
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
            'codesousfamille',
            'numfacture',
            'numcmd',
            'typebien',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
