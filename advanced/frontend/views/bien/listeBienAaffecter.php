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


$this->title = 'Liste des biens mis en instance';
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        

<legend>Liste des biens mis en instance</legend>
</br>  
<h5> Veuiller séléctionner les biens à affecter et remplir les informations d'affectation</h5>
</br>

 
<?php $form = ActiveForm::begin(); ?>
              
                <div class="col-lg-4">
              <?= $form->field($affect, 'numAffectation')->textInput() ?>
                </div>
                
                
                
                
                <div class="col-lg-4">
          
<?= $form->field($dat, 'dt')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'template' => '{addon}{input}',

        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
])->label("Date d'affectation");?>
                </div>
              
                <div class="col-lg-4">
                     
                           <?= $form->field($bureau, 'codebureau', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList(
                                            ArrayHelper::map(Bureau::find()->asArray()->all(), 'codebureau', 'codebureau'),
                                                  ['prompt'=>'----------Choisir le bureau----------']) ?>
                </div>
                
                
                
                <div class="col-lg-12">

<?= GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchInstance,
		
    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
		   'designationbien',
           'codesousfamille',
           
           'numfacture',
            'dt',
           // 'status',
		    ['class' => 'yii\grid\CheckboxColumn'],

        ],
    
    
]);?>
  </div>
 
 <div class="col-lg-6 offset-lg-6">
  <?= Html::SubmitButton( 'Affecter', [ 'class' => 'btn btn-primary' ,  'data' => [
                'confirm' => 'Voulez-vous vraiment affecter les biens séléctionnés?',
                'method' => 'post']]
         ) ?>    
  </div>
                  
<?php ActiveForm::end(); ?>


  
  