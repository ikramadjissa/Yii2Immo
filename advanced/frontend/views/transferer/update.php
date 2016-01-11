<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widjets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Bureau;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Transferer */


$this->title = "Modification";
$this->params['breadcrumbs'][] = ['label' => 'Liste des navettes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Navette du bien $model->codebien", 'url' => ['view', 'codebien' => $model->codebien, 'dt' => $model->dt, 'codebureau' => $model->codebureau]];
$this->params['breadcrumbs'][] = "Modification";
?>
  <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="transferer-update">

    <h3>Modification de la navette</h3>

    <?= $this->render('_form', [
        'model' => $model,
    		//'bureau'=>$bureau,
    ]) ?>

</div>
