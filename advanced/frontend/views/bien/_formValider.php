

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider ;
use yii\bootstrap\Dropdown;
use frontend\models\Bien;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Bien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-formValider">

    <?php $form = ActiveForm::begin(); ?>
    
          <?php //= $form->field($model, 'dateRef') ?> 
    <div>
                     <?= $form->field($model, 'dateRef')->widget(
                                 DatePicker::className(), [
                                                'template' => '{addon}{input}',
                                                'clientOptions' => [
                                                  'autoclose' => true,                                 
                                                   'format' => 'dd/mm/yyyy'
                                                           ]
                                                   ])?>
     </div>
    <?= $form->field($model, 'typereforme')->dropDownList( ['Cession','Don', 'Mise au rebut', 'Perdu'],['prompt'=>'------------ ']);
    		?>
    		
<br />
<p>
	<B>Séléctionner les Biens reformés :</B>
	
</p>
   <?= GridView::widget([ 
    
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
         'columns' => [
		 ['class' => 'yii\grid\SerialColumn'],
		 		
            'codebien',
             'designationbien',
             'etatbien',
             'dateenr',
            ['class' => 'yii\grid\CheckboxColumn'],
			 			 
           // ['class' => 'yii\grid\ActionColumn'],
          /* [
           // 'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
          'label' => 'birthday',
            
           'value' => function ($data) 
            {
                return "tet"; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
            ],*/
          //  'bureau.designationbureau' ,
            
        ],
    ]); 
//	$keys = $('#grid').yiiGridView('getSelectedRows');
//	echo "string".$keys;

//$model = $dataProvider->getModels();    
	
	/*echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'codebien',               // title attribute (in plain text)
        'description:html',    // description attribute formatted as HTML
        [                      // the owner name of the model
            'label' => 'codebien',
           'value' => 1,
        ],
       'created_at:datetime', // creation date formatted as datetime
    ],
]);*/
 ?>
   <br />
<?=Html::submitButton('Valider', ['class' =>'btn btn-primary']);?>
<br />
    

    <?php ActiveForm::end(); ?>
</div>