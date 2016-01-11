
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\assets\IndexAsset;
use yii\widgets\Menu;

/* @var $this \yii\web\View */
/* @var $content string */

IndexAsset::register($this);

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    
    <!-- Affichage de la barre logo -->
    
  	<div class="panel panel-primary">
        <div class="panel-heading">
            <div class=" row">
                <div class="col-md-2">
                     <?php echo Html::img('@web/img/caar logo.png') ?>
                </div>
                <div class="col-md-2"> </div>
                <div class="col-md-6">   
                    <?php echo Html::img('@web/img/titreApp2.png') ?>
                </div>
                <div class="col-md-1">
                        <?php echo Html::img('@web/img/g2.png') ?>
                </div>
                <div class="col-md-1">     
                     <?php echo Html::img('@web/img/dar2.png') ?>
                </div>
            </div>
        </div>
  </div> 
    
    
    
    <!-- affichage du menu principal -->
    
     
    
    
    
 
<!-- ------------------------------------------------------------------------------- -->
        <div class="container">
      
      <!-- ici -->
      
      
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>
    
    
    
   
    
  

    <footer class="footer">
        <div class="container">
        </br></br></br></br>
        <p style="text-align: center">Copyright &copy; CAAR - <?= date('Y') ?></p>
       

        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
