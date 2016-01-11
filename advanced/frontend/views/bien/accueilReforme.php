<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm; 
use yii\data\ActiveDataProvider ;
use yii\widgets\DetailView;
use frontend\models\BienSearch;
?>
<p>
1.--------------------------------------------------------
</p>

<p>
        <?= Html::a('Ajouter bien a la reforme', ['reformer']) ?>
</p>
<p>
2.--------------------------------------------------------
</p>    
<p>
        <?= Html::a('Liste biens a reformer', ['bien/indexrefo']) ?>
</p>
3.--------------------------------------------------------
</p>    
<p>
 <?= Html::a('Valider liste des bien reforme', ['bien/valider']) ?>
</p>
4.--------------------------------------------------------
</p>    
<p>
  <?= Html::a('Liste des biens reforme', ['bien/valider']) ?>
</p>