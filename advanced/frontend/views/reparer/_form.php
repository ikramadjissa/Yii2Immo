<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Reparer */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="reparer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div>
        <label  class="col-lg-2 control-label">Code bien :</label>
            <?= $form->field($model, 'codebien')->textInput()->label(false) ?>
        
    
    </div>

   <div>
    <label  class="col-lg-2 control-label">Numéro de réparation :</label>
         <?= $form->field($model, 'numreparation')->textInput()->label(false) ?>
    
   </div>
    <div>
         <label  class="col-lg-2 control-label">Structure :</label>
          <?= $form->field($model, 'codestructure')->dropDownList(['siege'=>'Siège central','Succursale Cheraga' => 'Succursale Chéraga', 
     		'Succursale Annaba' => 'Succursale Annaba', 'Succursale Oran'=>'Succursale Oran',
     		'Succursale Constantine'=>'Succursale Constantine','Succursale Bouzareah'=>'Succursale Bouzareah'])->label(false); ?>
       
       </div>
   
       <div>
         <label  class="col-lg-2 control-label">Code préstataire :</label>
          <?= $form->field($model, 'num_reg')->textInput()->label(false) ?>
       </div>

                   <div >
                      <label  class="col-lg-2 control-label">Date de sortie :</label>
               
                    <?= $form->field($dat, 'dt')->widget(
                                  DatePicker::className(), [
                                                   
                                                'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>
                   
                    </div>
                    
                    
                   <div>
                      <label  class="col-lg-2 control-label">Date d'entrée :</label>
                      <?= $form->field($model, 'datefin')->widget(
                                  DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>
                    </div>

    <div>
     <label  class="col-lg-2 control-label">Motif de réparation :</label>
   
    <?= $form->field($model, 'motif')->textArea()->label(false) ?>
    </div>


    <div class="form-group col-lg-offset-3">
        <?= Html::submitButton($model->isNewRecord ? 'Créer' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
