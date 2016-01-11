<?php 
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Structure;
use dosamigos\datepicker\DatePicker;


 ?>
   <?= $this->render('men');?>
   
   <div class="col-lg-12">
       <?php $form = ActiveForm::begin( ); ?>
        </br>
       <h4> Veuillez choisir une structure et une date pour afficher le nombre de biens par état</h4>
       </br>
         <div class="col-lg-3 ">
                        <label >Structure :</label>
                        
     <?= $form->field($stru, 'designation')->dropDownList(['siege'=>'Siège central','Succursale Cheraga' => 'Succursale Chéraga', 
     		'Succursale Annaba' => 'Succursale Annaba', 'Succursale Oran'=>'Succursale Oran',
     		'Succursale Constantine'=>'Succursale Constantine','Succursale Bouzareah'=>'Succursale Bouzareah'])->label(false); ?>
                                                               
                                                   
                    </div>
                    
                    
        <div class="col-lg-3 ">
                      <label  >Date début :</label>
                        <?= $form->field($debut, 'dt')->widget(
                                  DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>   
                    </div>            
                    
                    
      <div class="col-lg-3 ">
                      <label  >Date de fin :</label>
                       <?= $form->field($fin, 'datefin')->widget(
                                  DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                 'clientOptions' => [
                                                   'autoclose' => true,                                 
                                                    'format' => 'dd/mm/yyyy'
                                                            ]
                                                    ])->label(false);?>   
                    </div>                  
                    

                      <div class=" col-lg-3">
                     
                              <?= Html::SubmitButton('Afficher' , ['class' => 'btn btn-primary']) ?>
                               </div>                        
                    </div>
                    
                    
                    
 <div class="row col-lg-6 col-lg-offset-2 ">
   
 <?php
 
 echo Highcharts::widget([
   'options' => [
 		'chart'=> [
 			'type'=> 'column'
 		],
      'title' => ['text' => 'Nombre de biens par état'],
      'xAxis' => [
 		'title' => ['text' => 'Les états de biens'],
 		'type'=> 'category'
       
      ],
      'yAxis' => [
         'title' => ['text' => 'Nombre de biens']
      ],
 		
 		'legend'=>[
 			'enabled'=> false
 		],
 		
 		'plotOptions'=> [
 			'series'=> [
 				'borderWidth'=> 0,
 				'dataLabels'=> [
 					'enabled'=> true,
 					//'format'=> '{point.y:.1f}'
 				]
 			]
 		],
 		
 		'tooltip'=> [
 			'headerFormat'=> '<span style="font-size:11px">{series.name}</span><br>',
 			'pointFormat'=> '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
 		],
 		
 		
 		'series'=> [[
 			'name'=> "Etat",
 			'colorByPoint'=> true,
 			'data'=> [[
 				'name'=> "en fonction",
 				'y'=> $fonc,
 				
 			], [
 				'name'=> "en instance",
 				'y'=> $inst,
 				
 			], [
 				'name'=> "en réparation",
 				'y'=> $repa,
 				
 			], [
 				'name'=> "cédés",
 				'y'=> $cede,
 				
 			], [
 				'name'=> "mis au rebus",
 				'y'=> $rebu,
 				
], 
[
'name'=> "donnés",
'y'=> $don,
	
],
[
 				'name'=> "disparus",
 				'y'=> $dispar,
 			
 			]]
 		]],
 		
   ]
]);
 ?>
       <?php ActiveForm::end(); ?>
  </div>
     
                    

   



      
  