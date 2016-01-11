<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widjets\Pjax;
use yii\helpers\Url;
use app\models\Sousfamille;
use dosamigos\datepicker\DatePicker;
use app\models\Bien;
use app\models\Modele;
use yii\widgets\Breadcrumbs;

$bien = new Bien;
$this->title = 'Transport';
$this->params['breadcrumbs'][] = ['label' => 'Informations générales', 'url' => ['acquisition']];
$this->params['breadcrumbs'][] = ['label' => 'Amortissement', 'url' => ['amort' , 'id'=>$bien->codebien]];
$this->params['breadcrumbs'][] = $this->title;

$dataModele= ArrayHelper::map(Modele::find()->asArray()->all(), 'marque', 'marque');

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Informations sur le bien du transport</legend>
</br>
<?php $form = ActiveForm::begin(); ?>
             
<div class="col-lg-12" >
             
             
                        <label  class="col-lg-2 control-label">Marque:</label>
                           <?= $form->field($mod, 'marque', [
                                                    'horizontalCssClasses' => [
                                                     
                                                           ]])->dropDownList($dataModele,
                                                  ['prompt'=>'----------Choisir une marque----------',
                                                    'onchange' => '
                                                           $.post( "index.php?r=bien/listmarque&id='.'"+$(this).val(), function( data ) {
                                            $( "select#modele-modele").html( data );
                                        });'
                                                           		
                                                                            ] )->label(false) ?>
                       
                         
                         
                          <div >
                        <label  class="col-lg-2 control-label">Modèle:</label>
                        
                                 <?= $form->field($mod, 'modele', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList(
                                            ArrayHelper::map(Modele::find()->asArray()->all(), 'modele', 'modele'),
                                                  ['prompt'=>'----------Choisir un modèle ----------'])->label(false) ?>
                        
                    </div>
                    
                    
             
              <label class="col-lg-2 control-label">Matricule:</label>
               <?= $form->field($transp, 'matricule')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Année de fabrication:</label>
               <?= $form->field($transp, 'annee_fab')->textInput()->label(false); ?>
              </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Numéro de chassie:</label>
               <?= $form->field($transp, 'numchassie')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Energie:</label>
               <?= $form->field($transp, 'energie')->textInput()->label(false); ?>
              </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Puissance CV:</label>
               <?= $form->field($transp, 'puisscv')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Charge:</label>
               <?= $form->field($transp, 'charge')->textInput()->label(false); ?>
              </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Nombre de places:</label>
               <?= $form->field($transp, 'nb_place')->textInput()->label(false); ?>
              </div>

          
                 <div>
                   <?= Html::SubmitButton('Enregister', ['transport','id' => $bien->codebien,'class' => 'btn btn-primary col-lg-offset-3' ]) ?>  
                </div>
                
              <?php ActiveForm::end(); ?>