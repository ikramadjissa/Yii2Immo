<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widjets\Pjax;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
//use kartik\grid\GridView;
use app\models\Bureau;
use yii\widgets\Breadcrumbs;
$this->title = 'Liste des biens affectés';

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        

<legend>Liste des biens affectés</legend>
</br> 

<div class="col-lg-12">

<?= GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchAffect,
	
		
		//'export' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
		    'designationbien',
            'codebureau',
         
           //  'statutbien',
            'numAffectation',
            'dt',
            
	

        ],
    
    
]);?>
  </div>
 