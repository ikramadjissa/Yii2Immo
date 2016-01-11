<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widjets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\ActiveField;
use app\models\Bien;
use yii\widgets\Breadcrumbs;

$bien = new Bien;
?>

<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<?php $form = ActiveForm::begin() ?>
   <div class="col-lg-offset-4" >
    </br>
   <h4 style = " display: inline;"> Voulez-vous que le bien soit:</h4>
   </br>  </br> 
       <?= $form->field($immo, 'statutbien')->radioList(array('affecte'=>'affecte',  'mis en instance'=>'mis en instance'),
       		array(
       				'labelOptions'=>array('style'=>'display:inline'), // add this code
       				'separator'=>' &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ',
       		)
       		)->label(false) ;?>
   
   </div>
    		<div class="col-lg-offset-2">
    		 <?= Html::SubmitButton('Confirmer', [ 'class' => 'btn btn-primary col-lg-offset-3' , 'data' => [
                'confirm' => 'Voulez-vous vraiment confirmer cette opération?',
                'method' => 'post']]) ?> 
   
    		</div>                                              
    
<?php ActiveForm::end(); ?>



      
  