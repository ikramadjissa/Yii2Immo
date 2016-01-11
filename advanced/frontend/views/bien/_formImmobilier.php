<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widjets\Pjax;
use yii\helpers\Url;
use app\models\Bien;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;

$bien = new Bien;
$this->title = 'Immobilier';
$this->params['breadcrumbs'][] = ['label' => 'Informations générales', 'url' => ['acquisition']];

$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Informations sur le bien immoblier</legend>
<?php $form = ActiveForm::begin(); ?>
              
               
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Coût du bien:</label>
               <?= $form->field($immo, 'prixachat')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Adresse:</label>
               <?= $form->field($immo, 'adresse')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Superficie:</label>
               <?= $form->field($immo, 'superfice')->textInput()->label(false); ?>
              </div>
              
              
              
                <div>
                     <?= Html::SubmitButton('Enregister', ['immobilier','id' => $bien->codebien , 'class' => 'btn btn-primary col-lg-offset-3' ]) ?>    
                
                </div>
              
              <?php ActiveForm::end(); ?>
              
       

    
   
   