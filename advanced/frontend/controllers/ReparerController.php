<?php

namespace frontend\controllers;

use Yii;
use app\models\Reparer;
use app\models\Bien;
use app\models\Dat;
use app\models\ReparerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ReparerController implements the CRUD actions for Reparer model.
 */
class ReparerController extends Controller
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
     * Lists all Reparer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReparerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reparer model.
     * @param string $codebien
     * @param string $num_reg
     * @param integer $idpiecejointe
     * @param string $dt
     * @return mixed
     */
    public function actionView($codebien, $num_reg, $dt)
    {
        return $this->render('view', [
            'model' => $this->findModel($codebien, $num_reg, $dt),
        ]);
    }

    /**
     * Creates a new Reparer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reparer();
        $dat = new Dat();
        $bien = new Bien();
        if ($model->load(Yii::$app->request->post()) && $dat->load(Yii::$app->request->post()) ) {
        	$codebien = $model->codebien;
        	$bien= Bien::find()->where(['codebien' => $codebien])->one();
        	if ($bien) {
        		$bien->statutbien = "en réparation";
                $model->dt = $dat->dt;
                $model->datefin=null;
                
                //controle de date
                $dateSysteme = date('d/m/Y'); //récupérer date systeme
                $tabSys = explode('/', $dateSysteme); //convertir en tableau dont le séparateur est /
                $secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
                 
                $tabSorti = explode('/', $dat->dt);
                $secSorti= mktime(0, 0, 0, $tabSorti[1], $tabSorti[0], $tabSorti[2]);
                if ($secSys >= $secSorti) {
                	$dat->save();
                	$bien->save();
                	$model->save();
                }

                else {
                	Yii::$app->getSession()->setFlash('danger', 'La date que vous avez entrée est superieure à celle du système. Veuillez entrer une date valide s il vous plait');
                	return $this->redirect(['create']);
                
                }
                
        	}
        	else {
        		Yii::$app->getSession()->setFlash('danger', 'Le code que vous avez entré est incorrect !');
        		return $this->render('create', [
                'model' => $model,
        				'dat'=>$dat,
            ]);
        	}
            return $this->redirect(['view', 'codebien' => $model->codebien, 'num_reg' => $model->num_reg, 'dt' => $model->dt]);
        } else {
            return $this->render('create', [
                'model' => $model,
            		'dat'=>$dat,
            ]);
        }
    }

    /**
     * Updates an existing Reparer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $codebien
     * @param string $num_reg
     * @param integer $idpiecejointe
     * @param string $dt
     * @return mixed
     */
    public function actionUpdate($codebien, $num_reg,  $dt)
    {
        $model = $this->findModel($codebien, $num_reg,  $dt);
        $dat = new Dat;
        if ($model->load(Yii::$app->request->post()) &&$model->save() ) {
        	
        	//controle de date
        	$dateSysteme = date('d/m/Y'); //récupérer date systeme
        	$tabSys = explode('/', $dateSysteme); //convertir en tableau dont le séparateur est /
        	$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
        	 
        	$tabSorti = explode('/', $model->dt);
        	$secSorti= mktime(0, 0, 0, $tabSorti[1], $tabSorti[0], $tabSorti[2]);
        	
        	$tabEntre = explode('/', $model->datefin);
        	$secEntre= mktime(0, 0, 0, $tabEntre[1], $tabEntre[0], $tabEntre[2]);
        	
        	if ($secSys >= $secEntre ) {
                 if ($secEntre >= $secSorti) {
                 	
                 	return $this->redirect(['view', 'codebien' => $model->codebien, 'num_reg' => $model->num_reg,  'dt' => $model->dt]);
                 	 
                 }else {
                 	Yii::$app->getSession()->setFlash('danger', 'La date d entrée ne doit pas être supérieure à la date de sortie');
                 	return $this->render('update', [
                'model' => $model,
            		'dat'=>$dat,
            ]);
                 }
        		}else {
                	Yii::$app->getSession()->setFlash('danger', 'La date que vous avez entrée est superieure à celle du système. Veuillez entrer une date valide s il vous plait');
                return $this->render('update', [
                'model' => $model,
            		'dat'=>$dat,
            ]);
                
                }
        	
        	
        } else {
            return $this->render('update', [
                'model' => $model,
            		'dat'=>$dat,
            ]);
        }
    }

    /**
     * Deletes an existing Reparer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $codebien
     * @param string $num_reg
     * @param integer $idpiecejointe
     * @param string $dt
     * @return mixed
     */
    public function actionDelete($codebien, $num_reg, $dt)
    {
        $this->findModel($codebien, $num_reg, $dt)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reparer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $codebien
     * @param string $num_reg
     * @param integer $idpiecejointe
     * @param string $dt
     * @return Reparer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codebien, $num_reg, $dt)
    {
        if (($model = Reparer::findOne(['codebien' => $codebien, 'num_reg' => $num_reg, 'dt' => $dt])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
   
}
