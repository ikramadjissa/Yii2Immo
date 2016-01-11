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
$this->title = 'Materiel informatique';
$this->params['breadcrumbs'][] = ['label' => 'Informations générales', 'url' => ['acquisition']];
$this->params['breadcrumbs'][] = ['label' => 'Amortissement', 'url' => ['amort' , 'id'=>$bien->codebien]];
$this->params['breadcrumbs'][] = $this->title;

$dataModele= ArrayHelper::map(Modele::find()->asArray()->all(), 'marque', 'marque');

?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Informations sur le materiel informatique</legend>

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
                         
                         
                          <div >
                        <label  class="col-lg-2 control-label">Modèle:</label>
                        
                                 <?= $form->field($matInformatique, 'modele')->textInput()->label(false) ?>
                         </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Numéro de série:</label>
               <?= $form->field($matInformatique, 'numserie')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Ram:</label>
               <?= $form->field($matInformatique, 'ram')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Disque dur:</label>
               <?= $form->field($matInformatique, 'disquedur')->textInput()->label(false); ?>
              </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Systeme d'exploitation:</label>
               <?= $form->field($matInformatique, 'os')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Carte graphique:</label>
               <?= $form->field($matInformatique, 'cartegraph')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Processeur:</label>
               <?= $form->field($matInformatique, 'processur')->textInput()->label(false); ?>
              </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Caméra:</label>
               <?= $form->field($matInformatique, 'camera')->textInput()->label(false); ?>
              </div>
              
                <div>
                   <?= Html::SubmitButton('Enregister', ['informatique','id' => $bien->codebien , 'class' => 'btn btn-primary col-lg-offset-3' ]) ?>  
                </div>
              
              <?php ActiveForm::end(); ?>