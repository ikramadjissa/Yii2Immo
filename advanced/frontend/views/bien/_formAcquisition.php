<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widjets\Pjax;
use yii\helpers\Url;
use app\models\Sousfamille;
use app\models\Fournisseur;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Breadcrumbs;

$this->title = 'Fiche d investissement';
$this->params['breadcrumbs'][] = 'informations générales';

$dataFamille = ArrayHelper::map(Sousfamille::find()->asArray()->all(), 'designationfamille', 'designationfamille');
?>

   <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
        
        
        
<legend>Fiche d'investissment</legend>

<?php $form = ActiveForm::begin(); ?>

<div class="col-lg-12">
 <div class="col-lg-6">
                        <label  class="col-lg-3 control-label">Famille:</label>
                           <?= $form->field($soufamille, 'designationfamille', [
                                                    'horizontalCssClasses' => [
                                                     
                                                           ]])->dropDownList($dataFamille,
                                                  ['prompt'=>'----------Choisir une famille----------',
                                                    'onchange' => '
                                                           $.post( "index.php?r=bien/listfamille&id='.'"+$(this).val(), function( data ) {
                                            $( "select#sousfamille-designationsousfamille").html( data );
                                        });'
                                                           		
                                                                            ] )->label(false) ?>
                                                                            
                         </div>
                         
                            <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Date d'acquisition:</label>
                      <?= $form->field($dat, 'dt')->widget(
                                  DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>
                    </div>
                         
                   
            
                         
</div>
                    
                         
                     
      <div class="col-lg-12">
      
     
                        <div class="col-lg-6">
                        <label  class="col-lg-3 control-label">Sous famille:</label>
                        
                                 <?= $form->field($soufamille, 'designationsousfamille', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList(
                                            ArrayHelper::map(Sousfamille::find()->asArray()->all(), 'designationsousfamille', 'designationsousfamille'),
                                                  ['prompt'=>'----------Choisir une sous-famille ----------'])->label(false) ?>
                        
                    </div> 
                    
             <div class="col-lg-6">
                          <label  class="col-lg-3 control-label">Date commande:</label>
                      <?= $form->field($cmd, 'datecmd')->widget(
                                  DatePicker::className(), [
                                          'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>
                    </div>
                 
      
      </div>  
      
      
      <div class="col-lg-12">
     
                    
                     <div class="col-lg-6">
                    
                    </div>
                     <div class="col-lg-6">
                          <label  class="col-lg-3 control-label">Date facture:</label>
                      <?= $form->field($fact, 'datefact')->widget(
                                  DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>
                    </div>
      </div>             
                     
                     
               
      <div class="col-lg-12">
      
      
         <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Désignation:</label>
                         <?= $form->field($model, 'designationbien')->textInput(['maxlength' => true])->label(false); ?>
                    </div>
           <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Date début garantie:</label>
                         <?= $form->field($model, 'datedebugarantie')->widget(
                                  DatePicker::className(), [
                                               'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>
                    </div>
                      
     </div> 
           
      </div>                    
                  
                    
                    
<div class="col-lg-12">


 <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Etat:</label>
                        <?= $form->field($model, 'etatbien')->dropDownList(['-'=>'-','noeuf' => 'Neuf', 'bon' => 'Bon', 'mauvais'=>'Mauvais'])->label(false); ?>
                    </div>

                    <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Date fin garantie:</label>
                         <?= $form->field($model, 'datefingarantie')->widget(
                                  DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>
                      </div>

          
</div>
                    
                    
                    
    <div class="col-lg-12">
   
                    
                    <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Numéro de commande:</label>
                        <?= $form->field($cmd, 'numcmd')->textInput(['maxlength' => true])->label(false); ?>
                    </div>
    
   <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">TVA:</label>                     
                        <?= $form->field($fact, 'tva')->textInput(['maxlength' => true])->label(false); ?>
                    </div>
                      
                    
                     
    </div>                
                    
     
     
     
     <div class="col-lg-12">
     
                     
                      <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Numéro de facture:</label>
                        <?= $form->field($fact, 'numfacture')->textInput()->label(false); ?>
                    </div>
                     <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Commentaire:</label>
                   
                       <?= $form->field($model, 'commentaire')->textInput()->label(false); ?>
                      </div>
                 
                   </div> 
                   
          
     <div class="col-lg-12">
      <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Fournisseur:</label>
                    
                      <?= $form->field($fourn, 'regcomm', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList(
                                            ArrayHelper::map(Fournisseur::find()->asArray()->all(), 'regcomm', 'regcomm'),
                                                  ['prompt'=>'----------Choisir code fournisseur ----------'])->label(false) ?>
                
                       
                    </div>
                     
                     
      
      <div class="col-lg-6">
                      <label  class="col-lg-3 control-label">Quantité:</label>
                    <?= Html::input('text', 'quantite', Yii::$app->request->post('quantite'), ['class' => 'form-control ']) ?>
                      </div>
    
                      
     </div>     
                 
                  
                
                      <div class="form-group col-lg-offset-10">
                              <?= Html::SubmitButton('Suivant' , ['class' => 'btn btn-primary']) ?>
                               </div>
                    
                         <?php ActiveForm::end(); ?>
                         
                           
                         
  
                        