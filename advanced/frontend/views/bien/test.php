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
        
<?= Html::beginForm([''], 'post', ['data-pjax' => '' ]); ?>
<? Pjax::begin(); ?>



   <div class="col-lg-12">
   <label  class="col-lg-2 control-label">code bien:</label>
     <div class= "col-lg-8">
     <?= Html::input('text', 'code', Yii::$app->request->post('code'), ['class' => 'form-control col-lg-4 ']) ?>
    
      <?= Html::SubmitButton( 'search',['value' => Url::to('index.php?r=bien/transfert') ,'class' => 'btn btn-primary']) ?>  
     </div>
      
   </div>
        </br>  </br>     </br>  </br>
                        <div class="col-lg-offeset-6 " ><label style ="color: orange"> Etat actuel du bien : </label> </div>
                         </br>  
                      <div class="col-lg-12">
                        <label class=" control-label">Transferé du :</label>
                        <label class="control-label col-lg- 2" ><?= $bureau1 ?> </label>
                       </div> 
                                      </br>  </br>
                    
                    <div class="col-lg-12">
                        <label class=" control-label">Transferé vers:</label>
                        <label class="control-label " ><?= $bureau2?> </label>
                    </div>
                    
    
    <? Pjax::end(); ?>
    
        
    
    
<?= Html::endForm() ?>
    