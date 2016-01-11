
<?php

//use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widjets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Bureau;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Breadcrumbs;

$dataStruct = ArrayHelper::map(Bureau::find()->asArray()->all(), 'codestructure', 'codestructure');


?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Nouvelle navette </legend>

</br>

<?= Html::beginForm([''], 'post', ['data-pjax' => '' ]); ?>
<? Pjax::begin(); ?>



   <div class="col-lg-12">
   <label  class="col-lg-2 control-label">code bien:</label>
     <div class= "col-lg-8">
     <?= Html::input('text', 'code', Yii::$app->request->post('code'), ['class' => 'form-control col-lg-4 ']) ?>
    
      <?= Html::SubmitButton( '',['value' => Url::to('index.php?r=bien/transfert') ,'class' => 'btn btn-primary glyphicon glyphicon-search']) ?>  
     </div>
      
   </div>
        </br>  </br>     </br> 
                        <div class="col-lg-offeset-6 " ><label style ="color: #dd4814"> Etat actuel du bien : </label> </div>
                         </br>  
                      <div class="col-lg-12">
                        <label class=" control-label">Désignation:</label>
                        <label class="control-label col-lg-offset-1" ><?= $designationBien ?> </label>
                       </div> 
                                      </br>  </br>
                    
                    <div class="col-sm-12">
                        <label class=" control-label">Structure actuelle:</label>
                        <label class="control-label col-sm-offset-1 " ><?= $structu?> </label>
                    </div>
                     </br>  </br>
                    <div class="col-lg-12">
                        <label class=" control-label">Bureau actuel:</label>
                        <label class="control-label col-sm-offset-1" > <?= $bureau1?></label>
                    </div>
                         </br>  </br>
                         <div class="col-sm-12" >
                        <label class="control-label">Date du dernier transfert:</label>
                        <label class="control-label col-sm-offset-1"> <?= $datTrans?></label>
                        </div>
                         </br>  </br>  
    
    <? Pjax::end(); ?>
    
 
    
      <?php $form = ActiveForm::begin( ); ?>
    </br> 
                <div class="col-lg-offeset-6 " >
                <label style ="color: #dd4814"> Transférer vers : </label>
                 </div>
                   </br> 
                  
                   
                    <div >
                        <label class="col-lg-2 control-label">Nouvelle structure :</label>
                          <?= $form->field($bureau, 'codestructure', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList($dataStruct,
                                                  ['prompt'=>'----------Choisir la structure----------',
                                                    'onchange' => '
                                                           $.post( "index.php?r=bien/lists&id='.'"+$(this).val(), function( data ) {
                                            $( "select#bureau-codebureau").html( data );
                                        });'
                                                           		
                                                                            ] )->label(false) ?>
                    </div>
                 
                
                   
                   
                   
                    <div >
                        <label class="col-lg-2 control-label">Nouveau Bureau:</label>
                           <?= $form->field($bureau, 'codebureau', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList(
                                            ArrayHelper::map(Bureau::find()->asArray()->all(), 'codebureau', 'codebureau'),
                                                  ['prompt'=>'----------Choisir le bureau----------'])->label(false) ?>
                         
                    </div>
            
                    
                    <div>
                        <label for="DateTrans" class="col-lg-2 control-label">Date de transfert:</label>
 
<?= $form->field($trans, 'dt')->widget(
    DatePicker::className(), [
       
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
])->label(false);?>
                    </div>
                    
                    
 
                    
                    
                      <div >
                        <label for="motif" class="col-lg-2 control-label">Motif du transfert:</label>
                          <?= $form->field($trans, 'motif')->textarea()->label(false) ?>
                    </div>
             

            <div>
             
                <?= Html::SubmitButton('Transférer', ['class' => 'btn btn-primary col-lg-offset-3' , 'data' => [
                'confirm' => 'Voulez-vous vraiment transférer ce bien?',
                'method' => 'post']]) ?>
                
                <?= Html::ResetButton('Annuler', ['class' => 'btn btn-primary ']) ?>

            </div>

               
    
    
    
     <?php ActiveForm::end(); ?>
    
    
<?= Html::endForm() ?>



