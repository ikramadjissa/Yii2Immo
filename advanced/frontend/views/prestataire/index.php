<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PrestataireSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Liste des préstataires';
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="prestataire-index">

     </br>
    <h3><?= Html::encode($this->title) ?></h3>
    </br>
   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'num_reg',
            'designation',
             'natureprestation',
            'adresse',
            'tel',
            'fax',
            'email:email',
            // 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<p>
        <?= Html::a('Créer un nouveau préstataire', ['create'], ['class' => 'btn btn-primary col-lg-offset-5']) ?>
    </p>
