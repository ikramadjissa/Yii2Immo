<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widjets\Pjax;
use yii\helpers\Url;
use app\models\Bien;
use app\models\Modele;
use yii\widgets\Breadcrumbs;
$bien = new Bien;
$this->title = 'Materiel chaud et froid';
$this->params['breadcrumbs'][] = ['label' => 'Informations générales', 'url' => ['acquisition']];
$this->params['breadcrumbs'][] = ['label' => 'Amortissement', 'url' => ['amort' , 'id'=>$bien->codebien]];
$this->params['breadcrumbs'][] = $this->title;

$dataModele= ArrayHelper::map(Modele::find()->asArray()->all(), 'marque', 'marque');

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Informations sur le bien chaud/froid</legend>
<?php $form = ActiveForm::begin(); ?>
              
                <div class="col-lg-12">
                        <label  class="col-lg-2 control-label">Marque:</label>
                           <?= $form->field($mod, 'marque', [
                                                    'horizontalCssClasses' => [
                                                     
                                                           ]])->dropDownList($dataModele,
                                                  ['prompt'=>'----------Choisir une marque----------',
                                                    'onchange' => '
                                                           $.post( "index.php?r=bien/listmarque&id='.'"+$(this).val());'
                                                           		
                                                                            ] )->label(false) ?>
                       
                         </div>
                         
                          <div  class="col-lg-12">
                        <label  class="col-lg-2 control-label">Modèle:</label>
                        
                                 <?= $form->field($matChauFroid, 'modele')->textInput()->label(false) ?>
                         </div>
                    
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Référence:</label>
               <?= $form->field($matChauFroid, 'ref')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Capacité du chaud:</label>
               <?= $form->field($matChauFroid, 'cptchaud')->textInput()->label(false); ?>
              </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Capacité du froid:</label>
               <?= $form->field($matChauFroid, 'cptfroid')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Débit d'air:</label>
               <?= $form->field($matChauFroid, 'debitair')->textInput()->label(false); ?>
              </div>
              
              
                 <div>
                   <?= Html::SubmitButton('Enregister', ['chaud','id' => $bien->codebien,'class' => 'btn btn-primary col-lg-offset-3' ]) ?>  
                </div>
                
              <?php ActiveForm::end(); ?>