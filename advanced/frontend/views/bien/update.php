<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widjets\Pjax;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Bien */

$this->title = 'Update Bien: ' . ' ' . $model->codebien;
$this->params['breadcrumbs'][] = ['label' => 'Biens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codebien, 'url' => ['view', 'id' => $model->codebien]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="bien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    		
    		
    ]) ?>

</div>
