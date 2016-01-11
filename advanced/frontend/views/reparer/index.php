<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReparerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Liste des fiches de réparations';
$this->params['breadcrumbs'][] = $this->title;
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="reparer-index">
     </br>
    <h3><?= Html::encode($this->title) ?></h3>
    </br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
             'numreparation',
            'num_reg',
            'dt',
           
            'datefin',
            'motif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

 <p>
        <?= Html::a('Créer fiche de réparation', ['create'], ['class' => 'btn btn-primary col-lg-offset-5']) ?>
    </p>
