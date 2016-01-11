<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Amortissement';
$this->params['breadcrumbs'][] = ['label' => 'Fiche d investissement', 'url' => ['acquisition']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        

<legend>Amortissement</legend>
</br>

<?php $form = ActiveForm::begin(); ?>
<div>

             
              
              <div class="col-lg-12" >
                        <label class="col-lg-2 control-label">Compte comptable:</label>
                        <label class="control-label "> <?= $compte?></label>
              </div>
              </br> </br>
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Durée de vie (ans):</label>
               <?= $form->field($model, 'dureevie')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Coût du bien (DA):</label>
               <?= $form->field($model, 'prixachat')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Type d'amortissement:</label>
               <?= $form->field($model, 'typeamort')->dropDownList(['Lineaire' => 'Linéaire', 'Degressif' => 'Dégressif'])->label(false); ?>
              </div>
              
            
              
</div>

                 <div>
                   <?= Html::SubmitButton('Suivant', ['amort', 'id' => $model->codebien,'class' => 'btn btn-primary col-lg-offset-3' ]) ?>  
                </div>
<?php ActiveForm::end(); ?>
  
       
