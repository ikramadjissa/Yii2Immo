<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\widjets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
//use kartik\grid\GridView;
use yii\bootstrap\Modal;
use app\models\Bureau;
use yii\widgets\Breadcrumbs;

$this->title = 'Liste des nouvelles acquisitions';

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
</br> 
<legend>Liste des nouvelles acquisitions</legend>
</br> 
  
<h5> Veuiller séléctionner des biens et leur effectuer une affectation ou une mise en instance</h5>
</br>

 
 
 <?php $form = ActiveForm::begin(); ?>
            
 <div class="col-lg-4">
              <?= $form->field($affect, 'numAffectation')->textInput() ?>
 </div>
 
  
  <div class="col-lg-4">  
                           <?= $form->field($bureau, 'codebureau', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList(
                                            ArrayHelper::map(Bureau::find()->asArray()->all(), 'codebureau', 'codebureau'),
                                                  ['prompt'=>'----------Choisir le bureau----------']) ?>
   </div>
              
 
 
 
           
 
 
   <div class="col-lg-4">
<?= $form->field($datAff, 'dt')->widget(
    DatePicker::className(), [
     'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
])->label("Date d'affectation");?>
  </div> 

<div class="col-lg-12">

<?= GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
				
		//'export' => false,
    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
		    'designationbien',
            'codesousfamille',
            'numfacture',
            'dateacquisition',
             'statutbien',
		    ['class' => 'yii\grid\CheckboxColumn'],

        ],
    
    
]);?>
  </div>

  
    <div class="col-lg-12">
      
         <?= Html::SubmitButton('Affecter', ['listenouvelleacquiaffect','class' => 'btn btn-primary' , 'data' => [
                'confirm' => 'Voulez-vous vraiment affecter les biens séléctionnés?',
                'method' => 'post']]) ?>
  </div>
  
                  
<?php ActiveForm::end(); ?>
 


 