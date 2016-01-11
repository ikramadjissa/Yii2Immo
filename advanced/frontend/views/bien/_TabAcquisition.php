<?php 
use kartik\tabs\TabsX;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widjets\Pjax;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
?>
<?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
<legend>Fiche d'investissment</legend>
</br>



<?=  TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
		'encodeLabels'=>false,
    'items' => [
     
		

		[
		'label' => 'Informations générales',
		'content' => $this->render('_formAcquisition', ['model' => $model,
				'famille'=>$famille,
				'soufamille' =>$soufamille,
				'dat'=>$dat,
				'cmd'=>$cmd,
				'fact'=>$fact]),
				'active' => true,
				],
		
        [
            'label' => 'Amortissement',
            'content' => $this->render('_formAmortAcquisition', ['model' => $model,'compte'=>$compte,'model2' => $model2,]),
		
        ],
		
		
      
    ],
]);
?>
  
    
 
  
 <div class="form-group">       
  <?= Html::SubmitButton('Enregistrer bien', ['class' => 'btn btn-primary col-lg-offset-3' ,'id' => 'subr']) ?>

    </div>
    
    
 
   
  
  /*************************************************************************************************/

[
		'label' => 'Informations complementaires',
		'items' => [
		[
		'label' => 'Transport',
		'content' => $this->render('_formTransport', ['transp' => $transp]),
		],
		[
		'label' => 'Materiel informatique',
		'content' => $this->render('_formMaterielInformatique', ['matInformatique' => $matInformatique]),
		],
		[
		'label' => 'Materiel bureatique',
		'content' => $this->render('_formMaterielBureautique', ['matBuro' => $matBuro]),
		],
		[
		'label' => 'Materiel chaud et froid',
		'content' => $this->render('_formMaterielChaudFroid', ['matChauFroid' => $matChauFroid]),
		],
		[
		'label' => 'bien immobilier',
		'content' => $this->render('_formImmobilier', ['immo' => $immo]),
		],
		],
		],
   
 
 
  