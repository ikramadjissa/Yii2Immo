<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IntervenantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Commissaires priseurs';
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="intervenant-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=Html::beginForm(['reformer/intervcession'],'post');?>
  
<?=Html::submitButton('Valider', ['class' =>'btn btn-primary']);?>
 </br>
 </br>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'typeinter',
             'titre',
             'adresse',
             'mail',
            'tel',
            // 'idintervenant',
['class' => 'yii\grid\CheckboxColumn'],

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
              <?= Html::a('Ajouter commissaire priseur', ['createcommissaire'], ['class' => 'btn btn-primary']) ?>
    
  <?= Html::endForm();?>
</div>
