<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Fournisseur */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Créer un nouveau fournisseur';

?>

<div class="fournisseur-form">

    <?php $form = ActiveForm::begin(); ?>
    
       <div>
     <label class=" col-lg-2 control-label">Code fournisseur:</label>
         <?= $form->field($model, 'regcomm')->textInput()->label(false) ?>
     
     </div>

       <div>
     <label class=" col-lg-2 control-label">Nom :</label>
         <?= $form->field($model, 'designation')->textInput()->label(false) ?>
     
     </div>
     

       <div>
     <label class=" col-lg-2 control-label">Adresse:</label>
         <?= $form->field($model, 'adressfourn')->textInput()->label(false) ?>
     
     </div>
     
       <div>
     <label class=" col-lg-2 control-label">Téléphone:</label>
         <?= $form->field($model, 'telfourn')->textInput()->label(false) ?>
     
     </div>
     
      <div>
     <label class=" col-lg-2 control-label">Fax:</label>
         <?= $form->field($model, 'fax')->textInput()->label(false) ?>
     
     </div>


    <div class="form-group col-lg-offset-3 ">
        <?= Html::submitButton($model->isNewRecord ? 'Creer' : 'Modifier', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
