<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widjets\Pjax;
use yii\helpers\Url;
use app\models\Bien;
use app\models\Modele;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;

$this->title = 'Materiel bureautique';
$this->params['breadcrumbs'][] = ['label' => 'Informations générales', 'url' => ['acquisition']];
$this->params['breadcrumbs'][] = ['label' => 'Amortissement', 'url' => ['amort' , 'id'=>$bien->codebien]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Informations sur le materiel bureautique</legend>
<?php $form = ActiveForm::begin(); ?>
              
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Dimenssion:</label>
               <?= $form->field($matBuro, 'dimenssion')->textInput()->label(false); ?>
              </div>
              
              <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Couleur:</label>
               <?= $form->field($matBuro, 'couleur')->textInput()->label(false); ?>
              </div>
              
               <div class="col-lg-12" >
              <label class="col-lg-2 control-label">Matière de fabrication:</label>
               <?= $form->field($matBuro, 'matiere_fabrication')->textInput()->label(false); ?>
              </div>
              
             <div>
                <?= Html::SubmitButton('Enregister', ['bureautique','id' => $bien->codebien,  'class' => 'btn btn-primary col-lg-offset-3' ]) ?>  
             </div>
              
              <?php ActiveForm::end(); ?>
              
                <?php
        Modal::begin([
                'header'=>'<h4>Affectation ou mise en instance</h4>',
                'id' => 'modal',
                'size'=>'modal-lg',
            ]);
     
        echo "<div id='modalContent'>
		

		</div>";
     
        Modal::end();
    ?>
