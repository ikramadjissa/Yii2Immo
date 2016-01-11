<?php 
use kartik\tabs\TabsX;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widjets\Pjax;
use yii\helpers\Url;
use app\models\Bien;
use yii\widgets\Breadcrumbs;
$model = new Bien;
?>



         
<div>

    <?= $this->render('_formAmortAcquisition', [
    				'model' => $model,
    		        'compte'=>$compte
    				]); ?>
</div>

