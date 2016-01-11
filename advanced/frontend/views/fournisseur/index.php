<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FournisseurSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Liste des fournisseurs';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<div class="fournisseur-index">

    
   
    <h3><?= Html::encode($this->title) ?></h3>
    </br>
   
   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'regcomm',
            'designation',
            'adressfourn',
            'telfourn',
            'fax',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
 <p>
        <?= Html::a('Creer un nouveau fournisseur', ['create'], ['class' => 'btn btn-primary col-lg-offset-5']) ?>
    </p>
