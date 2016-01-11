
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
<?php
            NavBar::begin([
                //'brandLabel' => '                                ',
               // 'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                  'class' => 'navbar',
                 
                ],
             
            ]);
            
        $menuItems = [
                
                ['label' => 'Cycle de vie', 'url' => ['#'],
                    'items' => [
[
'label' => 'Acquisition', 
 
'items' => [
['label' => 'Nouvelle fiche d investissement', 'url' => ['bien/acquisition'],],
['label' => 'Gestion de fournisseurs', 'url' => ['fournisseur/create'],
'items' => [
['label' => 'Nouveau fournisseur', 'url' => ['fournisseur/create'],],
['label' => 'Liste des fournisseurs', 'url' => ['fournisseur/index'],],

],
],

],

],

[
'label' => 'Affectation', 'url' => ['bien/listenouvelleacquiaffect'],

'items' => [
['label' => 'Affecter un bien', 'url' => ['bien/listenouvelleacquiaffect'],],
['label' => 'Liste des biens affectés', 'url' => ['bien/biensaffectes'],],


],


],


[
'label' => 'Mise en instance', 'url' => ['bien/listenouvelleacqui'],

'items' => [
['label' => 'Mettre un bien en instance', 'url' => ['bien/listenouvelleacqui'],],
['label' => 'Liste des biens mis en instance', 'url' => ['bien/listeaffecter'],],


],


],


[
'label' => 'Transfert', 'url' => ['bien/transfert'],
'items' => [

['label' => 'Nouvelle navette', 'url' => ['bien/transfert'],],
['label' => 'Liste des navettes', 'url' => ['transferer/index'],],
],
],


[
'label' => 'Réparation', 'url' => ['reparer/create'],

'items' => [
['label' => 'Nouvelle fiche de réparation', 'url' => ['reparer/create'],],
['label' => 'Liste des biens en réparation', 'url' => ['reparer/index'],],
['label' => 'Ajouter bien à la réforme', 'url' => ['bien/reformer'],],
['label' => 'Gestion de préstataires', 'url' => ['prestataire/create'],
'items' => [
['label' => 'Nouveau préstataire', 'url' => ['prestataire/create'],],
['label' => 'Liste des préstataires', 'url' => ['prestataire/index'],],

],
],





],
],

[
'label' => 'Réforme',
'items' => [
['label' => 'Ajouter bien à  la réforme', 'url' => ['bien/reformer'],],
['label' => 'Valider les biens reformés', 'url' => ['bien/valider'],],
['label' => 'Consultation des biens',

'items' => [
['label' => 'A réformer', 'url' => ['bien/indexrefo'],],
['label' => 'Réformés', 'url' => ['reformer/listereformeenonsortirpatrimoine'],],

],
],

],


],

],

],


['label' => 'Comptabilité',
'items' => [
[
'label' => 'Réforme',
'items' => [
['label' => 'Consultation des biens réformés', 'url' => ['reformer/listereformeenonsortirpatrimoine'],],

['label' => 'Sortir biens réformés',

'items' => [
['label' => 'Cédés', 'url' => ['reformer/sortirbiencede'],],
['label' => 'Dons', 'url' => ['reformer/sortirbiendon'],],
['label' => 'Autres', 'url' => ['reformer/sortirbienautre'],],
],
],


['label' => 'Consultation des biens sortis du patrimoine',
'items' => [
['label' => 'Cédés', 'url' => ['reformer/listereformeecedesortirpatrimoine'],],
['label' => 'Dons', 'url' => ['reformer/listereformeedonsortirpatrimoine'],],
['label' => 'Autres', 'url' => ['reformer/listereformeeautresortirpatrimoine'],],
],
],


],
],
[
'label' => 'Amortissements',
'items' => [


['label' => 'Journal globale ', 'url' => ['bien/journalglobale'],],
['label' => 'Compte comptable ', 'url' => ['bien/etatimmobien'],],
['label' => 'Bien ', 'url' => ['bien/amortbien'],],


],


],
],
],


['label' => 'Inventaire',
'items' => [
[
'label' => 'Enregistrer Comptage',
'items' => [
['label' => 'Comptage 01 ', 'url' => ['inventorier/enregistrercomp'],],
['label' => 'Comptage 02', 'url' => ['inventorier/enregistrercomp2'],],
['label' => 'Comptage 03', 'url' => ['inventorier/enregistrercomp3'],],
],
],
[
'label' => 'Afficher Comptage',
'items' => [
['label' => 'Comptage 01 ', 'url' => ['inventorier/Affichercomp'],],
['label' => 'Comptage 02', 'url' => ['inventorier/Affichercomp2'],],
['label' => 'Comptage 03', 'url' => ['inventorier/Affichercomp3'],],
],
],

['label' => 'Afficher écarts entre comptages', 'url' => ['inventorier/afficherecartcomptage'],],

['label' => 'Valider inventaire physique', 'url' => ['inventorier/validerinvph'],],
['label' => 'écarts entre Inventaire théorique et physique', 'url' => ['inventorier/extraireecartthph'],],

],

],



['label' => 'Statistiques', 

'items' => [

['label' => 'Investissement', 'url' => ['bien/statinvest'],],
['label' => 'Etat du bien', 'url' => ['bien/stataparstatu'],],


],
],
['label' => 'Hisorique', 'url' => ['/bien/historique']],
            ];
            if (Yii::$app->user->isGuest) {
               // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Connexion', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Déconnexion (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
               'options' => ['class' => 'navbar-nav navbar-left'],
               'items' => $menuItems,
             
            ]);
            NavBar::end();
        ?>
