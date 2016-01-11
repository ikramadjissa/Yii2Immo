<?php
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
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
         
  <legend>Fiche mise en instance</legend>
  
  
  
   </br>  </br>
                    
  
  
       <?php $form = ActiveForm::begin( ); ?>
       
      <div class="col-lg-12">
                        <label class=" control-label">Code bien :</label>
                        <label class="control-label " > <?= $codeBien?></label>
                    </div>
                         </br>  </br>
                        <label class="col-lg-2 control-label">Date mise en instance:</label>
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
            'format' => 'dd/mm/yyyy'
        ]
])->label(false);?>
                    </div>
                    
                    
                    
                       <div>
             
                <?= Html::SubmitButton('mettre en instance', ['class' => 'btn btn-primary col-lg-offset-3' , 'name' => '']) ?>
                
                <a href="#" class="btn btn-primary" data-dissmiss="modal">Annuler</a>

            </div>
             
     <?php ActiveForm::end(); ?>
            
  