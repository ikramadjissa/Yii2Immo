<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Prestataire */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Créer un nouveau préstataire';
?>



<div class="prestataire-form">

    <?php $form = ActiveForm::begin(); ?>
     <div>
     <label class=" col-lg-2 control-label">Code préstataire:</label>
         <?= $form->field($model, 'num_reg')->textInput()->label(false) ?>
     
     </div>
     <div>
       <label class=" col-lg-2 control-label">Nom préstataire:</label>
    <?= $form->field($model, 'designation')->textInput()->label(false) ?>
     </div>
       <div>
       <label class=" col-lg-2 control-label">Profession:</label>
   <?= $form->field($model, 'natureprestation')->dropDownList(['mecanicien' => 'Mécanicien', 'TS informatique' => 'TS informatique'])->label(false); ?>
       
     </div>
     <div>
       <label class=" col-lg-2 control-label">Adresse:</label>
    <?= $form->field($model, 'adresse')->textInput()->label(false) ?>
     </div>
     <div>
       <label class=" col-lg-2 control-label">Téléphone:</label>
    <?= $form->field($model, 'tel')->textInput()->label(false) ?>
     </div>
     <div>
       <label class=" col-lg-2 control-label">Fax:</label>
    <?= $form->field($model, 'fax')->textInput()->label(false) ?>
     </div>
     <div>
       <label class=" col-lg-2 control-label">Email:</label>

    <?= $form->field($model, 'email')->textInput()->label(false) ?>
     </div>
   
     
    <div class="form-group col-lg-offset-3 ">
        <?= Html::submitButton($model->isNewRecord ? 'Créer' : 'Modifier', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
