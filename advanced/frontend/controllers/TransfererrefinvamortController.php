<?php

namespace frontend\controllers;

use Yii;
use app\models\transfererrefinvamort;
use app\models\transfererrefinvamortSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransfererrefinvamortController implements the CRUD actions for transfererrefinvamort model.
 */
class TransfererrefinvamortController extends Controller
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
     * Lists all transfererrefinvamort models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new transfererrefinvamortSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single transfererrefinvamort model.
     * @param string $codecomptecomptable
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
     * Creates a new transfererrefinvamort model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new transfererrefinvamort();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codecomptecomptable' => $model->codecomptecomptable, 'dat' => $model->dat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing transfererrefinvamort model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $codecomptecomptable
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
     * Deletes an existing transfererrefinvamort model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $codecomptecomptable
     * @param string $dat
     * @return mixed
     */
    public function actionDelete($codecomptecomptable, $dat)
    {
        $this->findModel($codecomptecomptable, $dat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the transfererrefinvamort model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $codecomptecomptable
     * @param string $dat
     * @return transfererrefinvamort the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codecomptecomptable, $dat)
    {
        if (($model = transfererrefinvamort::findOne(['codecomptecomptable' => $codecomptecomptable, 'dat' => $dat])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
