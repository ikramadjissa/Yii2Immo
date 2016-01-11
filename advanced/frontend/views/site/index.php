<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Acceuil';


?>
 <?= $this->render('men');?>
<div class="site-index">

    <div class="col-lg-offset-2">
        <h2>         Bienvenue à la gestion des immobilisations de la CAAR!</h2>

       
    </div>
         <div class="col-md-offset-5">     
                     <?php echo Html::img('@web/img/immoPic.jpg') ?>
                </div>
    
</div>
