<?php

namespace frontend\controllers;

use Yii;
use app\models\Intervenant;
use app\models\IntervenantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IntervenantController implements the CRUD actions for Intervenant model.
 */
class IntervenantController extends Controller
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
     * Lists all Intervenant models.
     * @return mixed
     */
public function actionIndex()
    {
        $searchModel = new IntervenantSearch();
        $dataProvider = $searchModel->searchintercession(Yii::$app->request->queryParams, "Cession");

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        		
        ]);
    }

    /**
     * Displays a single Intervenant model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Intervenant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   /* public function actionCreate()
    {
        $model = new Intervenant();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->titre]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/
    
    public function actionCreate()
    {
    	$model = new Intervenant();
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['view', 'id' => $model->titre]);
    	} else {
    		return $this->render('create', [
    				'model' => $model,
    				]);
    	}
    }

    /**
     * Updates an existing Intervenant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->titre]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Intervenant model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Intervenant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Intervenant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Intervenant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
    /**
     * unite concernant les dons
     *
     */
    
    
    public function actionIndexdon()
    {
    	$model= new Intervenant();
    	$searchModel = new IntervenantSearch();
    	$dataProvider = $searchModel->searchintercession(Yii::$app->request->queryParams, "Don");
    
    	return $this->render('createdon', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    
    			]);
    }
    

    public function actionCreatecommissaire()
    {
    	$model = new Intervenant();
    
    	if ($model->load(Yii::$app->request->post())) {
    		$model->typeinter="Cession";
    		$model->save();
    	}
    	$model = new Intervenant();
    	return $this->render('create', [
    			'model' => $model,
    			]);
    	 
    }
    
    
    public function actionCreunite()
    {
    	$model = new Intervenant();
    
    	if ($model->load(Yii::$app->request->post())) {
    		$model->typeinter="Don";
    		$model->save();
    	}
    	$model = new Intervenant();
    	return $this->render('createdon', [
    			'model' => $model,
    			]);
    
    }
    

    /*    ajouter le commissaire priseur dans la table des biens cede */
    
    public function actionIntervcession()
    {
    	$model=new Bien();
    	 
    	$modelss=new Intervenant();
    	$data=null;
    	$selection=(array)Yii::$app->request->post('selection');
    
    	foreach($selection as $id)
    	{
    		$modelref=new Reformer();
    		$x=0;
    		$modelss= $this->findModel($id);
    		$modelReformerSearch= new ReformerSearch();
    		$dataProviderRS = $modelReformerSearch->searchRefbool(Yii::$app->request->queryParams,'1');
    		$modelb=$dataProviderRS->getModels();
    		foreach($modelb as $rowb)
    		{
    			 
    			if($rowb->booleann=='1')
    			{
    				 
    				$modelref->codebien=$rowb->codebien;
    				$modelref->typereforme=''.$rowb->typereforme;
    				$modelref->datereforme=$rowb->datereforme;
    				$modelref->prixvente=floatval($rowb->prixvente);
    				$modelref->titre=''.$modelss->titre;
    				$modelref->booleann="2";
    				$modelref->save();
    			}
    		}
    	}
    
    	$searchModel = new BienSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchListeReformeNonSortiePatrimoine(Yii::$app->request->queryParams);
    
    	$models=$dataProvider->getModels();
    	foreach ($models as $row)
    	{
    		/*---------------------------------  recherche type de reforme et la date de reforme ------------------------*/
    		$comptecomp= $this->cherchercomptebien($row->codebien);
    		$modelReformerSearch= new ReformerSearch();
    		$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
    		$modelb=$dataProviderRS->getModels();
    		$typ=null;
    		$ann=null;
    
    		foreach ($modelb as $rowb)
    		{
    			$typ = $rowb->typereforme;
    			$ann = $rowb->datereforme;
    
    		}
    
    		/*-----------------------------------------------tableau de resultat------------------------------------------------*/
    		if($typ=="Cession")
    		{
    			$data[$i] = ['comptecomptable' => $comptecomp, 'codebien' => $row->codebien, 'designationbien'=>$row->designationbien, 'typereforme'=>$typ, 'dateRef'=>$ann];
    			$i++;
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'key'=>'codebien',
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => ['comptecomptable', 'codebien', 'designationbien', 'typereforme', 'dateRef'],
    			],
    			]);
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('sortirbienpatrimoine',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    
    	$searchModel = new IntervenantSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    	return $this->render('test', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }
    
    
    public function cherchercomptebien($code)
    {
    	$res=00;
    	$model= new BienSearch();
    	$searchModel= new BienSearch();
    	//searchConsultationBienSelonCode
    	$dataProvider = $searchModel->searchConsultationBienSelonCode(Yii::$app->request->queryParams,$code);
    	$modelss=$dataProvider->getModels();
    
    	foreach ($modelss as $rowsF)
    	{
    		$searchModelsf = new SousFamilleSearch();
    		$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$rowsF->codesousfamille);
    		$modelss=$dataProvidersf->getModels();
    
    		foreach ($modelss as $rowsF)
    		{
    			$searchModelsf = new SousFamilleSearch();
    			$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$rowsF->codesousfamille);
    			$modelss=$dataProvidersf->getModels();
    
    			foreach ($modelss as $rowsF)
    			{
    				$searchModelF = new FamilleSearch();
    				$dataProviderF = $searchModelF->searchFC(Yii::$app->request->queryParams, $rowsF->codefamille);
    				$modelF=$dataProviderF->getModels();
    				foreach ($modelF as $rowF)
    				{
    
    					$res=$rowF->codecomptecomptable;
    					return $res;
    
    				}
    			}
    		}
    	}
    }  
    
    
}
