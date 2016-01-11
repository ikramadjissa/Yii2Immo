<?php

namespace frontend\controllers;

use Yii;
use app\models\Transferer;
use app\models\TransfererSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Bureau;


/**
 * TransfererController implements the CRUD actions for Transferer model.
 */
class TransfererController extends Controller
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
     * Lists all Transferer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransfererSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transferer model.
     * @param string $codebien
     * @param string $dt
     * @param string $codebureau
     * @return mixed
     */
    public function actionView($codebien, $dt, $codebureau)
    {
    	$model = new Transferer;
    	$model = Transferer::find()->where(['codebien' => $codebien, 'dt' => $dt, 'codebureau' => $codebureau])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Transferer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transferer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codebien' => $model->codebien, 'dt' => $model->dt, 'codebureau' => $model->codebureau]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transferer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $codebien
     * @param string $dt
     * @param string $codebureau
     * @return mixed
     */
    public function actionUpdate($codebien, $dt, $codebureau)
    {
        $model = $this->findModel($codebien, $dt, $codebureau);
        $bureau = new Bureau;

        if ($model->load(Yii::$app->request->post())   ) {
        	
        	//$model->codebureau= $bureau->codebureau;
        	$model->save();
            return $this->redirect(['view', 'codebien' => $model->codebien, 'dt' => $model->dt, 'codebureau' => $model->codebureau]);
        } else {
            return $this->render('update', [
                'model' => $model,
            		//'bureau'=>$bureau,
            ]);
        }
    }

    /**
     * Deletes an existing Transferer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $codebien
     * @param string $dt
     * @param string $codebureau
     * @return mixed
     */
    public function actionDelete($codebien, $dt, $codebureau)
    {
        $this->findModel($codebien, $dt, $codebureau)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transferer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $codebien
     * @param string $dt
     * @param string $codebureau
     * @return Transferer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codebien, $dt, $codebureau)
    {
        if (($model = Transferer::findOne(['codebien' => $codebien, 'dt' => $dt, 'codebureau' => $codebureau])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La page demandée n existe pas.');
        }
    }
}
