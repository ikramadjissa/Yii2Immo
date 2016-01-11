<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Connexion';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-lg-offset-4">
    <h3>Authentification</h3>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->label("Utilisateur:"); ?>
                <?= $form->field($model, 'password')->passwordInput()->label("Mot de passe:"); ?>
               
               
                <div class="form-group">
                    <?= Html::submitButton('Connexion', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
