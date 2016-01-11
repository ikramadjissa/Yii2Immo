<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\widjets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Breadcrumbs;


$this->title = "Historique";

?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        

</br> 
<legend>Historique d'un bien </legend>
</br> 

<h5> Veuiller faire une recherche sur le code du bien afin d afficher son historique</h5>
</br>


<?= Html::beginForm(['bien/historique'], 'post', ['data-pjax' => '' ]); ?>


<div class="col-lg-12">
   <label  class="col-lg-2 control-label">code bien:</label>
     <div class= "col-lg-8">
     <?= Html::input('text', 'code', Yii::$app->request->post('code'), ['class' => 'form-control col-lg-4 ']) ?>
    
      <?= Html::SubmitButton( '',['class' => 'btn btn-primary glyphicon glyphicon-search']) ?>  
     </div>
      
   </div>
        </br>      </br>        </br>        </br>   
        <div class="col-lg-12">
                        <label class=" control-label">Désignation:</label>
                        <label class="control-label col-lg-offset-1" ><?= $designationBien ?> </label>
                       </div> 
        </br>        </br>        </br>              
                       

        
<div class="col-lg-12">

<?= GridView::widget([
    'dataProvider'=> $dataProvider,
   // 'filterModel' => $searchModel,
		'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
    'columns' => [
           
		    'date mouvement',
             'mouvement',
             'affecté vers',
             'transféré de',
             'transféré vers',
		      'date fin reparation',
              'type reforme'
		   

        ],
    
    
]);?>
  </div>
    
       
<?= Html::endForm() ?>

