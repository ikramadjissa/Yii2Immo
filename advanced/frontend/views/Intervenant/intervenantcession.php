<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IntervenantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Commissaire priseur';
$this->params['breadcrumbs'][]= $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<div class="intervenant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    
  <?=Html::beginForm(['reformer/sortirbiencede'],'post');?>
          <?= Html::a('Ajouter commissaire priseur', ['create'], ['class' => 'btn btn-success']) ?>
   <?= Html::a('==>', ['sortirbienpatrimoine', 'id' => $model->idintervenant], ['class' => 'btn btn-primary']) ?>
<?php //=Html::submitButton('Valider', ['class' =>'btn btn-success']);?>
 </br>
 </br>
  <?= Html::endForm();?>
   </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class'=>'yii\grid\SerialColumn'],
           // 'idintervenant',
            //'typeinter',
            'titre',
            'adresse',
            'mail',
            'tel',
['class' => 'yii\grid\CheckboxColumn'],

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
?>

</div>
