<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use app\models\Bien;
use app\models\Reformer;
use app\models\Intervenant;


/* @var $this yii\web\View */
/* @var $model app\models\Bien */
/* @var $form yii\widgets\ActiveForm */

$dataIntervenant = ArrayHelper::map(Intervenant::find()->where(['typeinter'=>'Don'])->asArray()->all(), 'titre', 'titre');
?>

<div class="bien-formAmort">

    <?php $form = ActiveForm::begin(); ?>
    
<div class="col-lg-12">
                        <label  class="col-lg-2 control-label"> Unite:</label>
                           <?= $form->field($model, 'titre', [
                                                   /* 'horizontalCssClasses' => [
                                                     
                                                           ]*/])->dropDownList($dataIntervenant,
                                                  ['prompt'=>'----------Choisir une unite----------',
                                                    'onchange' => '
                                                    $.post( "index.php?r=reformer/listunite&id='.'"+$(this).val(), function( data ) {   
                                            $( "select#intervenant-titre").html(data );
                                        });'
                                                           		
                               ])->label(false) ?>
                         </div>
                             
   <?= GridView::widget([

   		'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
     //    ['class' => 'yii\grid\SerialColumn'],		
           'comptecomptable',
            'codebien',
            'designationbien',
            'typereforme',
            'dateRef',
['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); 
?>    

    <?php ActiveForm::end(); ?>
</div>