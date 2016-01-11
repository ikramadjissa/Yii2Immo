

<?php
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\DetailView;

?>


<?php
$this->title = "La navette du bien $model->codebien";?>
<?php
$this->params['breadcrumbs'][] = ['label' => 'Liste des navettes', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
 <?= $this->render('men');?>
        <?= Breadcrumbs::widget([
       
        		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="bien-view">

    <h3><?= Html::encode($this->title) ?></h3>

</br>
 <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codebien',
            'codebureau',
            'dt', 
            'motif',
           
           
        ],
    ]) ?>
    

</div>

 <p>
        <?= Html::a('Modifier', ['update', 'codebien' => $model->codebien, 'dt' => $model->dt,'codebureau' => $model->codebureau], ['class' => 'btn btn-primary']) ?>
      
    </p>
