<?php

namespace frontend\controllers;

use Yii;
use app\models\Transfererrefinv;
use app\models\TransfererrefinvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransfererrefinvController implements the CRUD actions for Transfererrefinv model.
 */
class TransfererrefinvController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transfererrefinv models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransfererrefinvSearch();
     $modeltresfer= new Transfererrefinv();
     //$rowtrans->mnt= $resultat;
       //echo "---totale = ".$rowtrans->mnt;
  /*      $modeltresfer->codecomptecomptable= 123;
        $modeltresfer->codecomptecomptableref= 123;
        $modeltresfer->mnt= 12;
        $dattr='12/12/15';
        $dattr=date('d/m/y', strtotime($dattr));
        $modeltresfer->dat = $dattr;
       // echo $modeltresfer->dat;
         
        $modeltresfer->save();*/
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transfererrefinv model.
     * @param integer $codecomptecomptable
     * @param string $dat
     * @return mixed
     */
    
    public function actionView($codecomptecomptable, $dat)
    {
        return $this->render('view', [
            'model' => $this->findModel($codecomptecomptable, $dat),
        ]);
    }

    /**
     * Creates a new Transfererrefinv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transfererrefinv();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codecomptecomptable' => $model->codecomptecomptable, 'dat' => $model->dat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transfererrefinv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $codecomptecomptable
     * @param string $dat
     * @return mixed
     */
    public function actionUpdate($codecomptecomptable, $dat)
    {
        $model = $this->findModel($codecomptecomptable, $dat);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codecomptecomptable' => $model->codecomptecomptable, 'dat' => $model->dat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Transfererrefinv model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $codecomptecomptable
     * @param string $dat
     * @return mixed
     */
    public function actionDelete($codecomptecomptable, $dat)
    {
        $this->findModel($codecomptecomptable, $dat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transfererrefinv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $codecomptecomptable
     * @param string $dat
     * @return Transfererrefinv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codecomptecomptable, $dat)
    {
        if (($model = Transfererrefinv::findOne(['codecomptecomptable' => $codecomptecomptable, 'dat' => $dat])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
