<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inventorier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventorier-form">

    <?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    

    <?= $form->field($model, 'anneeinv')->textInput(['maxlength' => true]) ?>
     <div>
                     <?= $form->field($model, 'dateinventaire')->widget(
                                 DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                'clientOptions' => [
                                                  'autoclose' => true,                                 
                                                   'format' => 'dd/mm/yyyy'
                                                           ]
                                                   ])?>
     </div>
    <?= $form->field($model, 'codestructure')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'designationstructure')->textInput(['maxlength' => true]) ?>
    
   
  <?= GridView::widget([
       
          //  'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codebien',
            'designation',
            'bureau',
            'etat',
           
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <br />
<?=Html::submitButton('Enregistrer', ['class' =>'btn btn-primary']);?>
<br />
    
    <?php ActiveForm::end(); ?>

</div>
