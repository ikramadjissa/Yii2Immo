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
       <h4> Veuillez choisir une structure et une date pour afficher la valeur d'investissment par compte</h4>
       </br>
         <div >
                        <label >Structure :</label></div>
        <div class="col-lg-3 ">                 
     <?= $form->field($stru, 'designation')->dropDownList(['siege'=>'Siège central','Succursale Cheraga' => 'Succursale Chéraga', 
     		'Succursale Annaba' => 'Succursale Annaba', 'Succursale Oran'=>'Succursale Oran',
     		'Succursale Constantine'=>'Succursale Constantine','Succursale Bouzareah'=>'Succursale Bouzareah'])->label(false); ?>
                                                               
                                                   
                    </div>
                    
        
                    
                    

                      <div >
                     
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
      'title' => ['text' => "Valeur d'investissement par compte"],
      'xAxis' => [
 		'title' => ['text' => 'Comptes'],
 		'type'=> 'category'
       
      ],
      'yAxis' => [
         'title' => ['text' => 'Investissement']
      ],
 		
 		'legend'=>[
 			'enabled'=> true
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
 			'name'=> "Investissement",
 			'colorByPoint'=> true,
 			'data'=> [[
 				'name'=> "218452",
 				'y'=> $MaterielInformatique,
 				
 			], [
 				'name'=> "2110",
 				'y'=> $TerrainsDeConstruction,
 				
 			], [
 				'name'=> "218440",
 				'y'=> $MaterielAutomobile,
 				
 			], [
 				'name'=> "218450",
 				'y'=> $MobilierDeBureau,
 				
 			],

]
 		]],
 		
   ]
]);
 ?>
 
 
                      <div class=" col-lg-12">
                                   <label  >Total des investissements :</label>
                                    <label  ><?=$total?></label>
                              
                               </div>  
       <?php ActiveForm::end(); ?>
  </div>
     
  