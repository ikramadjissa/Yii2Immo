
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\assets\IndexAsset;

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
    
    

<nav class="navbar navbar-default">
    <div class="container-fluid">
        
      

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cycle de vie <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>@Html.ActionLink("Aquisition", "Aquisition", "CycleDeVie")</li>
                                <li class="dropdown-submenu">
                                    <a href="#">Affectation</a>
                                    <ul class="dropdown-menu">
                                        <li>@Html.ActionLink("Afficher les biens affectés", "BienAaffecter", "CycleDeVie")</li>
                                        <li>@Html.ActionLink("Affecter bien mis en instance", "MiseEnstance", "CycleDeVie")</li>
                                    </ul>
                                </li>
                                <li>@Html.ActionLink("Transfert", "Transfert", "CycleDeVie")</li>
                                <li>@Html.ActionLink("Reparation", "Reparation", "CycleDeVie")</li>
                                <li>@Html.ActionLink("Reforme", "Reforme", "CycleDeVie")</li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Amortissement <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Calculer des amortissements</a></li>
                                <li><a href="#">Consulter amortissement</a></li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inventaire <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Imprimer près inventaire</a></li>
                                <li><a href="#">Consulter inventaire</a></li>
                                <li><a href="#">Etat d'inventaire</a></li>

                            </ul>
                        </li>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Edition <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>@Html.ActionLink("Bordereau", "Bordereau", "CycleDeVie")</li>
                                <li><a href="#">Listes des biens en instance </a></li>
                                <li><a href="#"> etc .......</a></li>


                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Statistique <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Histogrammme investissements/comptes</a></li>
                                <li><a href="#">Valeur du patrimoine</a></li>


                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hisorique <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Historique bien</a></li>
                                <li><a href="#">Historique utilisateur</a></li>


                            </ul>
                        </li>
                        <!--la recherche-->
                        <li> 
                              <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        
                                            <div class="input-group-btn topBlock">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="glyphicon glyphicon-chevron-down "></span>

                                            </button>
                                        </div>
                                       
                                        
                                       <input type="text" class="form-control" placeholder="Rechercher" /> 
                                     
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <span class="sr-only">Search</span>
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>                
                                </form>
                        </li>

                    </ul>

                </div>
        </div>

</nav>
    
    
    
    
  <!--   <div class="wrap">
        </* ?php
            NavBar::begin([
                'brandLabel' => 'CAAR IMMO',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?> -->

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
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
