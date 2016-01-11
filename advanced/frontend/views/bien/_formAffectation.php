
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use yii\widjets\Pjax;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Bureau;


/* @var $this yii\web\View */
/* @var $model app\models\Bien */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
          
   <legend>Fiche d'affectation</legend>
   
<?php $form = ActiveForm::begin(); ?>
 

           
               
                <div class="col-lg-12">
           <label  class=" col-lg-2 control-label">Numéro d'affectation:</label>
            <?= $form->field($affect, 'numAffectation')->textInput()->label(false) ?>
                </div>
               
             
                <div class="col-lg-12">
                 <label  class=" col-lg-2 control-label">Date d'affectation:</label>
                    <?php 
// with an ActiveForm instance 
?>
<?= $form->field($dat, 'dt')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'd/m/yyyy'
        ]
])->label(false);?>
                </div>
          
           
              
           
            <div class="col-lg-10">
                    <label class="control-label" style ="color: orange" >Affecter vers :</label>
                </div>
           
             
                </br> </br>
           

                
                  <!-- juste a afficher le code et non pas à insérer -->      
                <div class="col-lg-12">
                      <label for="BurBien" class="col-lg-2 control-label">Code bureau:</label>
                           <?= $form->field($bureau, 'codebureau', [
                                                    'horizontalCssClasses' => [
                                                      'wrapper' => 'col-sm-3',
                                                           ]])->dropDownList(
                                            ArrayHelper::map(Bureau::find()->asArray()->all(), 'codebureau', 'codebureau'),
                                                  ['prompt'=>'----------Choisir le bureau----------'])->label(false) ?>
                </div>
           

               
                
               <div class="group-form col-lg-8">
               <?= Html::SubmitButton( 'Affecter', [ 'class' => 'btn btn-success', 'name' => 'affect-button', 'data' => [
                'confirm' => 'Voulez-vous confirmer cette affectation?',
                'method' => 'post']]) ?>    
                
                
               </div>
                 
                                           
                         <?php ActiveForm::end(); ?>
