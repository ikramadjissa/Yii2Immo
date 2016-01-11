<?php

namespace frontend\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

use app\models\Fournisseur;
use app\models\Bien;
use app\models\Comptecomptable;
use app\models\Reformer;
use app\models\Reparer;
use app\models\ReformerSearch;
use app\models\BureauSearch;
use app\models\ReparerSearch;
use app\models\TransfererSearch;
use app\models\transfererrefinvSearch;
use app\models\Transfererrefinv;
use app\models\Commande;
use app\models\Modele;
use app\models\Instance;
use app\models\InstanceSearch;
use app\models\Dat;
use app\models\Transferer;
use app\models\Affecter;
use app\models\AffecterSearch;
use app\models\Structure;
use app\models\Facture;
use app\models\Famille;
use app\models\Sousfamille;
use app\models\SousFamilleSearch;
use app\models\Bureau;
use yii\web\UploadedFile;
use app\models\Transport;
use app\models\Immobilier;
use app\models\Materielbureautique;
use app\models\Materielchaudfroid;
use app\models\Materielinformatique;
use app\models\BienSearch;
use app\models\BienSearchHistorique;
use app\models\BienAcquiSearch;
use app\models\FamilleSearch;
use app\models\BienSearchReforme;
use app\models\Reforme;
use app\models\StructureSearch;
use app\models\ComptecomptableSearch;
use app\models\ComptecomptableamortSearch;
use app\models\transfererrefinvamortSearch;
use app\models\Transfererrefinvamort;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BienController implements the CRUD actions for Bien model.
 */
class BienController extends Controller
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
     * Lists all Bien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bien model.
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
     * Creates a new Bien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bien();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codebien]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codebien]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
    
   
    

    /**
     * Deletes an existing Bien model.
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
     * Finds the Bien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Bien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
   
   
   
    /**********************************************************************************************/
    
  // cette action permet le choix d'affecation ou mise en instance
    public function actionTry(){
    	$immo = new Bien;
    	
    	if ($immo->load(Yii::$app->request->post())) {
    		//return $this->redirect(['immobilier', 'id' => 1,'quantite'=>2]);
    		$x= $immo->statutbien;
    		if ($x == 'affecte'){
    			return $this->redirect(['listenouvelleacquiaffect']);
    		}else return $this->redirect(['listenouvelleacqui']);
    		
    	}else 
    	
    	return $this->render('affectationModal', ['immo' => $immo]);
    	
    }
    
    /***********************************************************************************************/
    
    //cette action permet d'affecter les nouvelles acquisitions
    public function actionListenouvelleacquiaffect(){
    	
    	$searchModel = new BienAcquiSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$affect = new Affecter;
    	$bureau = new Bureau;
    	$datAff = new Dat;
    	$b=1;
    	$selection=(array)Yii::$app->request->post('selection');
    	
    	
    	foreach ($selection as $i){
    		$affect = new Affecter;
    	
    		$bureau = new Bureau;
    		$datAff = new Dat;
    		$bien = new Bien;
    			
    			
    		if (   ($affect->load(Yii::$app->request->post()))  
    		 &&   ($datAff->load(Yii::$app->request->post()))   &&   
    		  ($bureau->load(Yii::$app->request->post()))    ){
    	      
    			$bien->codebien= $i;
    			$affect->codebien = $bien->codebien;
    	         
    		
    			$dte=$datAff->dt;
    		
    			$affect->dt= $dte;
    			 
    			 
    			//controle de date
    			$dateSysteme = date('d/m/Y'); //récupérer date systeme
    			$tabSys = explode('/', $dateSysteme); //convertir en tableau dont le séparateur est /
    			$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
    			 
    			$tabPicker = explode('/', $dte);
    			$secPicker= mktime(0, 0, 0, $tabPicker[1], $tabPicker[0], $tabPicker[2]);
    			 
    			if ($secSys >= $secPicker) {
    				$bien = Bien::find()->where(['codebien' => $i])->one();
    				$bien->statutbien = 'affecte';
    				$bien->save();
    					
    				$datAff->save();
    					
    				$codBureau=$bureau->codebureau;
    				$affect->codebureau= $codBureau;
    	
    				$affect->save();
    	
    			}
    			else {
    				Yii::$app->getSession()->setFlash('warning', 'La date que vous avez entrée est superieure à celle du système. Veuillez entrer une date valide s il vous plait');
    				return $this->redirect(['listenouvelleacquiaffect']);
    			}
    			 
    		}
    	
    		$b=0;
    	}
    	if ($b==0) {
    		Yii::$app->getSession()->setFlash('info', 'L affectation a été bien faite.');
    		return $this->redirect(['biensaffectes']);
    
    	}
    	
    	return $this->render('oui', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'datAff' => $datAff,
    			'bureau'=>$bureau,
    			'affect'=>$affect,
    	
    			]);
    }
    
    /***********************************************************************************/
    
    // cette action permet d'ajouter les nouvelles acquisition à la mise en instance
    public function actionListenouvelleacqui(){
    	
    	$searchModel = new BienAcquiSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dat = new Dat;
        $instance = new Instance;
    	$selection=(array)Yii::$app->request->post('selection');
         $b=0;
    
    	 foreach ($selection as $i){
    	 		$bien = new Bien;
    	 		$dat=new Dat;
    	 		$instance = new Instance;
    	 		if(($dat->load(Yii::$app->request->post()))     &&   ($instance->load(Yii::$app->request->post()))   ){
    	 			$struc= $instance->codestructure;
    	 			
    	 			$dte=$dat->dt;
    	 			
    	 			//controle de date
    	 			$dateSysteme = date('d/m/Y'); //récupérer date systeme
    	 			$tabSys = explode('/', $dateSysteme); //convertir en tableau dont le séparateur est /
    	 			$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
    	 			
    	 			$tabPicker = explode('/', $dte);
    	 			$secPicker= mktime(0, 0, 0, $tabPicker[1], $tabPicker[0], $tabPicker[2]);
    	 			
    	 			if ($secSys >= $secPicker) {

    	 				$dat->save();
    	 				
    	 				$instance->dt=$dte;
    	 					
    	 				$bien->codebien = $i;
    	 				$bien = Bien::find()->where(['codebien' => $bien->codebien])->one();
    	 				$bien->statutbien = 'mis en instance';
    	 					
    	 				$instance->codebien=$bien->codebien;
    	 				$instance->codestructure =$struc;	
    	 				$instance->status = $bien->statutbien;
    	 				$bien->save();
    	 				$instance->save();
    	 				 
    	 			}
    	 			else {
    	 				Yii::$app->getSession()->setFlash('danger', 'La date que vous avez entrée est superieure à celle du système. Veuillez entrer une date valide s il vous plait');
    	 				return $this->redirect(['listenouvelleacqui']);
    	 			}
    	 			
    	 			
    	 		}
    	 	
    	 		$b=1;
    	 }
    	 if ($b==1) {
    	 	Yii::$app->getSession()->setFlash('success', 'Votre bien a bien  été ajouté à la liste des mise en instance !');
    	 	return $this->redirect(['listeaffecter']);
    	 }
    	
    
    	 return $this->render('_listNouvelAcquiInst', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'dat' => $dat,
    	 		'instance'=>$instance,
    	 		
    			]);
    	
    }
    
    
    /*************************************************************************************************/
    
    public function actionInformatique($id,$quantite,$sf)
    {
    	$b=0;
    	$bien = new Bien;
    	$mod = new Modele;
    	for ($i=1;$i<$quantite+1;$i++){
    		$matInformatique = new Materielinformatique;
    		$bien = Bien::find()->where(['codebien' => "".$sf."".($id+$i)])->one();
    	
    		if ($bien && $matInformatique->load(Yii::$app->request->post())    ) {
    			 
    		
    			$matInformatique->codebien = $bien->codebien;
    	
    			$matInformatique->seq = $id;
    		
    			$matInformatique->designationbien = $bien->designationbien;
    			
    		
    		    $matInformatique->dateacquisition = $bien->dateacquisition;
    		    
    			$matInformatique->statutbien = $bien->statutbien;
    		
    			$matInformatique->etatbien = $bien->etatbien;
    			
    			$matInformatique->prixachat = $bien->prixachat;
    			
    			$matInformatique->dureevie = $bien->dureevie;
    			
    			$matInformatique->typeamort = $bien->typeamort;
    		
    			$matInformatique->tauxamort = $bien->tauxamort;
    			
    			$matInformatique->commentaire = $bien->commentaire;
    		
    			// $matInformatique->poids = $bien->poids;
    			 
    			$matInformatique->datefingarantie = $bien->datefingarantie;
    			
    			$matInformatique->datedebugarantie = $bien->datedebugarantie;
    		
    			$bien->modele= $matInformatique->modele;
    		
    			$matInformatique->save();
    			
    			$bien->save();
    			 
    			$b=1;
    		
    		}
    		
    		else {
    			return $this->render('_formMaterielInformatique', ['matInformatique' => $matInformatique, 'bien' =>$bien, 'mod' =>$mod]);
    		}
    		
    	}
    	
    	if ($b==1) {
    		return  $this->redirect(['try']);
    	}else {
    		Yii::$app->getSession()->setFlash('danger', 'L enregistrement n a pas été fait !.');
    		return $this->render('_formMaterielInformatique', ['matInformatique' => $matInformatique, 'bien' =>$bien, 'mod' =>$mod]);
    	}
    
    }
     
    /**********************************************************************************/
    
    public function actionBureautique($id,$quantite,$sf)
    {
    
    	$bien = new Bien;
    	$immo = new bien;
    	$b=0;
    	for ($i=1;$i<$quantite+1;$i++){
    		$bien = Bien::find()->where(['codebien' => "".$sf."".($id+$i)])->one();
    		$matBuro = new Materielbureautique;
    		if ($bien && $matBuro->load(Yii::$app->request->post())   ) {
    			 
    			$matBuro->codebien = $bien->codebien;
    		
    			
    		
    			$matBuro->designationbien = $bien->designationbien;
    			 
    			$matBuro->dateacquisition = $bien->dateacquisition;
    			 
    			$matBuro->statutbien = $bien->statutbien;
    			 
    			$matBuro->etatbien = $bien->etatbien;
    		
    			$matBuro->prixachat = $bien->prixachat;
    			 
    			$matBuro->dureevie = $bien->dureevie;
    		
    			$matBuro->typeamort = $bien->typeamort;
    		
    			$matBuro->tauxamort = $bien->tauxamort;
    			 
    			$matBuro->commentaire = $bien->commentaire;
    		
    			$matBuro->datefingarantie = $bien->datefingarantie;
    			 
    			$matBuro->datedebugarantie = $bien->datedebugarantie;
    		
    			$matBuro->save();
    			$bien->save();
    			 
    		$b=1;
    		
    		}
    		
    		else {
    			return $this->render('_formMaterielBureautique', ['matBuro' => $matBuro, 'bien' =>$bien]);
    		}
    	}
        
    	if ($b==1) {
    		return  $this->redirect(['try']);
    		
    	}else {
    		Yii::$app->getSession()->setFlash('danger', 'L enregistrement n a pas été fait !.');
    		return $this->render('_formMaterielBureautique', ['matBuro' => $matBuro, 'bien' =>$bien]);
    		
    	}
    	
    	
    }
    
    
    
    /*********************************************************************************/
    public function actionChaud($id, $quantite,$sf)
    {
    	$b=0;
    	$bien = new Bien;
    	$mod = new Modele;
    	for ($i=1;$i<$quantite+1;$i++){
    		$matChauFroid = new Materielchaudfroid;
    		$bien = Bien::find()->where(['codebien' => "".$sf."".($id+$i)])->one();
    		
    		
    		if ($bien && $matChauFroid->load(Yii::$app->request->post())   &&   $mod->load(Yii::$app->request->post())  ) {
    			 
    			$modele = $mod->modele;
    		
    			$bien->modele=$modele;
    			$matChauFroid->modele=$modele;
    		
    			$matChauFroid->codebien = $bien->codebien;
    		
    			
    		
    			$matChauFroid->designationbien = $bien->designationbien;
    			 
    			$matChauFroid->dateacquisition = $bien->dateacquisition;
    			 
    			$matChauFroid->statutbien = $bien->statutbien;
    			 
    			$matChauFroid->etatbien = $bien->etatbien;
    		
    			$matChauFroid->prixachat = $bien->prixachat;
    			 
    			$matChauFroid->dureevie = $bien->dureevie;
    		
    			$matChauFroid->typeamort = $bien->typeamort;
    		
    			$matChauFroid->tauxamort = $bien->tauxamort;
    			 
    			$matChauFroid->commentaire = $bien->commentaire;
    			 
    			$matChauFroid->poids = $bien->poids;
    			 
    			$matChauFroid->datefingarantie = $bien->datefingarantie;
    			 
    			$matChauFroid->datedebugarantie = $bien->datedebugarantie;
    		
    			$matChauFroid->save();
    			$bien->save();
    			 
    			$b=1;
    		
    		}
    		
    		else {
    			return $this->render('_formMaterielChaudFroid', ['matChauFroid' => $matChauFroid, 'bien' =>$bien, 'mod' =>$mod]);
    		}
    		
    		
    	}
    	
    	if ($b==1) {
    		
    		return  $this->redirect(['try']);
    	}else {
    		Yii::$app->getSession()->setFlash('danger', 'L enregistrement n a pas été fait !.');
    		return $this->render('_formMaterielChaudFroid', ['matChauFroid' => $matChauFroid, 'bien' =>$bien, 'mod' =>$mod]);
    	}
    	
    }
    
    
    
    /*********************************************************************************/
    public function actionImmobilier($id, $quantite,$sf)
    {
    	$b=0;
    	$bien = new Bien;
    	for ($i=1;$i<$quantite+1;$i++){
    		$immo = new Immobilier;
    		
    		$bien = Bien::find()->where(['codebien' => "".$sf."".($id+$i)])->one();
    		if ($bien && $immo->load(Yii::$app->request->post())   ) {
    				
    			$immo->codebien = $bien->codebien;
    		
    			
    		
    			$immo->designationbien = $bien->designationbien;
    			 
    			$immo->dateacquisition = $bien->dateacquisition;
    			 
    			$immo->statutbien = $bien->statutbien;
    			 
    			$immo->etatbien = $bien->etatbien;
    		
    			$bien->prixachat = $immo->prixachat;
    			 
    			$immo->commentaire = $bien->commentaire;
    		
    			$immo->save();
    			$bien->save();
    			  $b=1;   		
    		}
    		
    		else {
    			return $this->render('_formImmobilier', ['immo' => $immo, 'bien' =>$bien]);
    		}
    	}
    	
    	
    	if ($b==1) {
    		
    		return $this->redirect(['try']);
    	}else {
    		Yii::$app->getSession()->setFlash('danger', 'L enregistrement n a pas été fait !.');
    		return $this->render('_formImmobilier', ['immo' => $immo, 'bien' =>$bien]);
    	}
    	
    	
    }
    
    /******************************************************************************/
    
    public function actionTransport($id,$quantite,$sf)
    {
        $b=0;
    	$bien = new Bien;
    	$mod = new Modele;
    	for ($i=1;$i<$quantite+1;$i++){
    		$transp = new Transport;
    		$bien = Bien::find()->where(['codebien' => "".$sf."".($id+$i)])->one();
    		
    		if ($bien && $transp->load(Yii::$app->request->post())   &&   $mod->load(Yii::$app->request->post())    ) {
    			 
    			$modele = $mod->modele;
    		
    			$bien->modele=$modele;
    			$transp->modele=$modele;
    		
    			$transp->codebien = $bien->codebien;
    		
    			$transp->typebien = $bien->typebien;
    		
    			$transp->designationbien = $bien->designationbien;
    			 
    			$transp->dateacquisition = $bien->dateacquisition;
    			 
    			$transp->statutbien = $bien->statutbien;
    			 
    			$transp->etatbien = $bien->etatbien;
    		
    			$transp->prixachat = $bien->prixachat;
    			 
    			$transp->dureevie = $bien->dureevie;
    		
    			$transp->typeamort = $bien->typeamort;
    		
    			$transp->tauxamort = $bien->tauxamort;
    			 
    			$transp->commentaire = $bien->commentaire;
    			 
    			$transp->poids = $bien->poids;
    			 
    			$transp->datefingarantie = $bien->datefingarantie;
    			 
    			$transp->datedebugarantie = $bien->datedebugarantie;
    		
    			$transp->save();
    			$bien->save();
    			 
    			$b=1;
    		
    		}
    		 
    		else {
    			return $this->render('_formTransport', ['transp' => $transp, 'bien' =>$bien, 'mod' =>$mod]);
    		}
    		
    	}
    	if ($b==1) {
    		return  $this->redirect(['try']);
    	}else {
    		Yii::$app->getSession()->setFlash('danger', 'L enregistrement n a pas été fait !');
    		return $this->render('_formTransport', ['transp' => $transp, 'bien' =>$bien, 'mod' =>$mod]);
    	}
    	
         
    }
    
    
    /*********************************************************************************/
    
    public function actionAmort($id,$quantite,$sf)
    {
    	$model = new Bien;
    	$compte = '';
    	for ($i=1;$i<$quantite+1;$i++)
    	{
    		
    		$bien = Bien::find()->where(['codebien' => "".$sf."".($id+$i)])->one();
    		//affichage du compte comptable
    		$codsouf= $bien->codesousfamille; //recupérer la soufamille
    		$souf= Sousfamille::find()->where(['codesousfamille' => $codsouf])->one();
    		$famcod = $souf->codefamille;	//recuperer la famille
    	     $fam = Famille::find()->where(['codefamille' => $famcod])->one();
    		$compte = $fam->codecomptecomptable; //recuperer le compte
    		
    		if ($bien && $model->load(Yii::$app->request->post())  ) {
    			
    			$vie = $model->dureevie;
    			$bien->dureevie=$vie;
    			$cout= $model->prixachat;
    			$bien->prixachat=$cout;
    			$typeAmort=$model->typeamort;
    			$bien->typeamort=$typeAmort;
    		
    			$tauxAmort=$model->tauxamort;
    			$bien->tauxamort=$tauxAmort;
    		
    			$bien->save();
    		
    		} else {
    			return $this->render('vueAmort', [
    					'model' => $model,'compte'=>$compte
    					]);
    		}
    		
    	}
    	
    	//$bien = Bien::find()->where(['codebien' => $id])->one();
    	$bien = Bien::find()->where(['codebien' => "".$sf."".$id])->one();
    	
    	
    	//$codSfami= $bien->codesousfamille;
    	$Sousfami = Sousfamille::find()->where(['codesousfamille' => $sf])->one();
    	
    	$desSfami= $Sousfami->designationfamille;
    	
    	//pour faire la comparaison entre deux chaines
    	$bur= strcmp ( $desSfami , "Mobilier de bureau" );
    	$tr= strcmp ($desSfami , "Materiel automobile" );
    	
    	$inf= strcmp ( $desSfami , "Materiel informatique" );
    	$cho= strcmp ( $desSfami , "Materiel de froid et de chaud" );
    	
    	if ($bur==0) {
    		return  $this->redirect(['bureautique' , 'id' => $id, 'quantite'=>$quantite,'sf'=>$sf]);
    	}elseif ($tr==0){
    	return  $this->redirect(['transport' , 'id' => $id, 'quantite'=>$quantite,'sf'=>$sf ]);
    	}
    	
    	elseif ($inf==0){
    	return  $this->redirect(['informatique' , 'id' => $id, 'quantite'=>$quantite,'sf'=>$sf]);
    	}
    	elseif ($cho==0){
    	return  $this->redirect(['chaud' , 'id' => $id, 'quantite'=>$quantite,'sf'=>$sf]);
    	}
    	
    	else 	return  $this->redirect(['try']);
    	
    }
    
    /*******************************************************************************/
    
    
    public function actionAcquisition(){
    	
    	$fourn = new Fournisseur;
    	$cmd = new Commande; 
    	$fact = new Facture; 
    	$model = new Bien;
    	$dat = new Dat;
    	
    	$soufamille = new Sousfamille;
    	$quantite = Yii::$app->request->post('quantite');
    	
    	if (       ($model->load(Yii::$app->request->post()))   &&   ($cmd->load(Yii::$app->request->post()))   && 
    	         ($fact->load(Yii::$app->request->post()))  &&    ($dat->load(Yii::$app->request->post()))
    	         &&($soufamille->load(Yii::$app->request->post()))   &&($fourn->load(Yii::$app->request->post()))  	&& $quantite        ) 
    {
    	//controler si le code bien nesxite pas ds la table bien
    	
    /*	$control = Bien::find()->where(['codebien' => $model->codebien])->one();
    	if ($control) {
    		Yii::$app->getSession()->setFlash('danger', 'Erreur!!! le code que vous avez entré existe déja.');
    		return $this->redirect(['acquisition']);
    	}*/
    	
    	$countt = Bien::find()->count();
    	//print ("count= $countt");
    	
    		$cdbienX = Bien::find()->where(['seq' => $countt])->one();
    	
    	if ($quantite  < 100) {
    	
    	for ($i=1;$i<($quantite+1);$i++){
    		$model2 = new Bien;
    		$cdsf= Sousfamille::find()->where(['designationsousfamille' => $soufamille->designationsousfamille])->one();
    		//$cdbien = $model->codebien;
    		
    		$cdbien = $cdbienX->seq; 
    		$sf=($cdsf->codesousfamille);
    		
            $som= $cdbien+$i;
            $model2->codebien= "".$sf."".$som; 
            $model2->seq =$som;
           //print ("code=  $model2->codebien");
    		$dte=$dat->dt;
    		
    		$fournisseurCod = $fourn->regcomm;
    		$fact->regcomm=$fournisseurCod;
    		
    		

    		//controle de date
    		$dateSysteme = date('d/m/Y'); //récupérer date systeme
    		$tabSys = explode('/', $dateSysteme); //convertir en tableau dont le séparateur est /
    		$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
    			
    		$tabPicker = explode('/', $dte);
    		$secPicker= mktime(0, 0, 0, $tabPicker[1], $tabPicker[0], $tabPicker[2]);
    			
    		if ($secSys >= $secPicker) {
    			
    			

    			$model->dateacquisition= $dte;
    			$dat->save();
    			
    			$model2->dateacquisition= $dte;
    			 $datcmd = $cmd->datecmd;
    			 $datfact = $fact->datefact;
    		  
    			 
    			$cmd->save();
    		    $fact->save();
    		    // faire le control des date cmd et date fact
    			 if ($datcmd != null) {
    			 	$tabDatCmd = explode('/', $datcmd);
    			 	$secDatCmd= mktime(0, 0, 0, $tabDatCmd[1], $tabDatCmd[0], $tabDatCmd[2]);
    			 	 if ($secSys < $secDatCmd ) {
    			 	  	Yii::$app->getSession()->setFlash('danger', 'La date de commande que vous avez entrée est superieure à la date d aujourdhui. Veuillez entrer une date valide s il vous plait');
    			 	   	return $this->redirect(['acquisition']);
    			 	   }
    			 	
    			 }
    			 
    			 if ($datfact != null) {
    			 	$tabDatFact = explode('/', $datfact);
    			 	$secDatFact= mktime(0, 0, 0, $tabDatFact[1], $tabDatFact[0], $tabDatFact[2]);
    			 	if ($secSys < $secDatFact) {
    			 		
    			 		Yii::$app->getSession()->setFlash('danger', 'La date de facture que vous avez entrée est superieure à la date d aujourdhui. Veuillez entrer une date valide s il vous plait');
    			 		return $this->redirect(['acquisition']);
    			 	}
    			 }
    			
    			
    		
    			
    			$cmde=$cmd->numcmd;
    			$model->numcmd= $cmde;
    			
    			$model2->numcmd= $cmde;
    			 
    			$facte = $fact->numfacture;
    			$model->numfacture = $facte;
    			
    			$model2->numfacture = $facte;
    			
    			$desSfam= $soufamille->designationsousfamille;
    			$soufam = Sousfamille::find()->where(['designationsousfamille' => $desSfam])->one();
    			$sfamille=$soufam->codesousfamille;
    			$model->codesousfamille = $sfamille;
    			
    			$des=$model->designationbien;
    			$model2->designationbien=$des;
    			
    			$model2->codesousfamille = $sfamille;
    			$model2->statutbien='acquis';
    			
    			
    			$etat = $model->etatbien;
    			$model2->etatbien=$etat;
    			
    			$comm = $model->commentaire;
    			$model2->commentaire=$comm;
    			
    			$poids = $model->poids;
    			$model2->poids=$poids;
    			
    			$datedebugarantie = $model->datedebugarantie;
    			$datefingarantie = $model->datefingarantie;
    			
    			if ( $datedebugarantie != null && $datefingarantie != null ) {
    				//convertir datedebugarantie en seconde pr faire le control
    				$tabDatDebu = explode('/', $datedebugarantie);
    				$secDatDebu= mktime(0, 0, 0, $tabDatDebu[1], $tabDatDebu[0], $tabDatDebu[2]);
    				
    				$model2->datedebugarantie=$datedebugarantie;
    				
    				//convertir datefingarantie en seconde pr faire le control
    				$tabDatFin = explode('/', $datefingarantie);
    				$secDatFin= mktime(0, 0, 0, $tabDatFin[1], $tabDatFin[0], $tabDatFin[2]);
    				
    				$model2->datefingarantie=$datefingarantie;

    				if ($secDatDebu >=$secDatFin) {
    					Yii::$app->getSession()->setFlash('danger', 'La date début de garantie ne doit pas être supérieure à la date de fin de garantie. Veuillez vérifier vos dates s il vous plait');
    					return $this->redirect(['acquisition']);
    				}
    				
    				//if ($secDatDebu > $secSys || $secDatFin > $secSys) {
    				if ($secDatDebu > $secSys ) {
    					Yii::$app->getSession()->setFlash('danger', 'La date de garantie est supérieure à la date d aujourdhui. Veuillez entrer une date valide s il vous plait');
    					return $this->redirect(['acquisition']);
    				}
    			}
    			
    			$modele = $model->modele;
    			$model2->modele=$modele;
    			
    			$model2->save();
    			
    			
    		}else {
    			Yii::$app->getSession()->setFlash('danger', 'La date d acquisition que vous avez entrée est superieure à la date d aujourdhui. Veuillez entrer une date valide s il vous plait');
    			return $this->redirect(['acquisition']);
    		}
    		
    	}
    	
    }else {
    	Yii::$app->getSession()->setFlash('danger', 'La quantité que vous avez saisie est très grande. Veuillez vérifier cette quantité s il vous plait');
    	return $this->redirect(['acquisition']);
    }
    	
    	   $imm= strcmp ( $soufamille->designationsousfamille , "Terrains de construction" );
    		if ($model2->save()){
    			
    	  	if ($imm==0) {
    	  	
    	  		return $this->redirect(['immobilier','id' => $cdbienX->seq,'quantite'=>$quantite,'sf'=>$sf]);
    	  	}else 
    	  	return  $this->redirect(['amort' , 'id' => $cdbienX->seq, 'quantite'=>$quantite,'sf'=>$sf]);
    	  
    		}
    		
    	
    		
    	}
    	else {
    		return $this->render('vueAcquisition', ['model' => $model,
    			
				'soufamille' =>$soufamille,
				'dat'=>$dat,
				'cmd'=>$cmd,
				'fact'=>$fact,
    				'fourn'=>$fourn,
    			]);
    	}
    
    	 	}   	 	
    	 	    	 	
   
    	


    	 	//////////////////////////////////////////////////////////////////////////////////////////////////////
    	 

             // cette action affiche la liste des biens affectés
          public function actionBiensaffectes(){
          	
          	
          	$y=0; 
          	$searchAffect = new AffecterSearch();
          	$dataProvider = $searchAffect->search(Yii::$app->request->queryParams);
          	 
          	$biens=$dataProvider->getModels();
          	 
          	foreach ($biens as $bien){
          		 
          		$bi = Bien::find()->where(['codebien' => $bien->codebien])->one();
          		if ($bi) {
          			$data[$y] = ['codebien'=>$bien->codebien,'designationbien'=> $bi->designationbien, 'codebureau'=> $bien->codebureau, 'numAffectation'=>$bien->numAffectation, 'dt'=>$bien->dt];
          			$y++;
          		}
          		
          		 
          		$dataProviderRes = new ArrayDataProvider([
          				'key' =>'codebien',
          				'allModels' => $data,
          				'sort' => [
          				'attributes' => ['codebien', 'designationbien', 'codebureau','numAffectation','dt'],
          				],
          				]);
          		 
          		 
          		$dataProvider=$dataProviderRes;
          	}
          	 
          	return $this->render('biensAffectes', [
          			'searchAffect' => $searchAffect,
          			'dataProvider' => $dataProvider,
          			 
          			]);
          	 
          	
          /*	$data=null;
          	$y=0;
          	$searchAffect = new AffecterSearch();
          	$dataProvider = $searchAffect->search(Yii::$app->request->queryParams);
          	
          	$biens=$dataProvider->getModels();
          	
          	foreach ($biens as $bien){
          		 
          		//$bi = Bien::find()->where(['codebien' => $bien->codebien])->one();
          		$searchb = new BienSearch();
          		$dataProviderb = $searchb->search(Yii::$app->request->queryParams);
          		 
          		$biensb=$dataProviderb->getModels();
          		
          		foreach ($biensb as $bienb){
          			if($bienb->codebien==$bien->codebien)
          			{  
          				$data[$y] = ['codebien'=>$bien->codebien,'designationbien'=> $bienb->designationbien, 'codebureau'=> $bien->codebureau, 'numAffectation'=>$bien->numAffectation, 'dt'=>$bien->dt];
          			$y++;
          			}
          		//print ("$bi->codebien");
         
          		}
          		
          	
          		$dataProviderRes = new ArrayDataProvider([
          				//'key' =>'codebien',
          				'allModels' => $data,
          				'sort' => [
          				'attributes' => ['codebien', 'designationbien', 'codebureau','numAffectation','dt'],
          				],
          				]);
          			
          			
          		$dataProvider=$dataProviderRes;
          	}
          	
          	return $this->render('biensAffectes', [
          			'searchAffect' => $searchAffect,
          			'dataProvider' => $dataProvider,
          			
          			]);*/
          	
          }
          /////////////////////////////////////////////////////////////////////////////////////////
    	 	
    	 	
          
          
    	 	public function actionTransfert()
    	 	{
    	 		$trans = new Transferer;
    	 		$dat = new Dat;
    	 		$bureau = new Bureau;
    	 	
    	 		$nomStruct ='';
    	 		$bur = '';
    	 		$des = '';
    	 		$y=0;
    	 		$str = '';
    	 		$datt = '';
    	 		$code = Yii::$app->request->post('code');
    	 	
    	 		if ($code) {
    	 			//on fait la recherche d'abord ds la table transferer sinon on la fait ds la table affecter
    	 			$Codebiens =Transferer::find()
    	 			->where(['codebien' => $code])
    	 			//->orderBy(['dt'=> SORT_DESC])
    	 			->orderBy(['dt'=> SORT_ASC])
    	 			->all();
    	 			
    	 			foreach ($Codebiens as $Codebien){
    	 				if ($Codebien) {
    	 					
    	 					$datTab[0] = $Codebien->dt;
    	 					$bureauTab[0] = $Codebien->codebureau;
    	 			
    	 				
    	 				$datt = $datTab[0];
    	 				$bur = $bureauTab[0];
    	 				$Designationbien = Bien ::find()->where(['codebien' =>$code])->one();
    	 		
    	 				$des = $Designationbien->designationbien;
    	 					
    	 				$struct = Bureau :: find()->where(['codebureau' =>$bur])->one();
    	 				if ($struct) {
    	 					$str1 = Structure :: find()->where(['codestructure' =>$struct->codestructure])->one();
    	 					$str = $str1->designation;
    	 				}
    	 			}
    	 			}
    	 			
    	 			$Codebien =Transferer::find()
    	 			->where(['codebien' => $code])
    	 			//->orderBy(['dt'=> SORT_DESC])
    	 			->orderBy(['dt'=> SORT_ASC])
    	 			->all();
    	 			if ($Codebien==null) {
    	 				
    	 			 
    	 				// on fait la recherche ds la table affecter
    	 				$Codebien = Affecter::find()->where(['codebien' => $code])->one();
    	 				if ($Codebien) {
    	 					$datt = 'null';
    	 					$bur = $Codebien->codebureau;
    	 					$Designationbien = Bien ::find()->where(['codebien' =>$code])->one();
    	 		
    	 					$des = $Designationbien->designationbien;
    	 					 
    	 					$struct = Bureau :: find()->where(['codebureau' =>$bur])->one();
    	 					if ($struct) {
    	 						$str1 = Structure :: find()->where(['codestructure' =>$struct->codestructure])->one();
    	 						$str = $str1->designation;
    	 					}
    	 		
    	 				}else	{
    	 					Yii::$app->getSession()->setFlash('info', 'Le bien n est même pas affecté, vous ne pouvez pas le transférer');
    	 					return $this->redirect(['transfert']);
    	 				}
    	 				
    	 				
    	 			}
    	 		//itwas here lacolade de for
    	 		}
    	 		
    	 		$dte=date('d/m/Y');//récupérer date systeme
    	 		 
    	 		$trans->dt= $dte;
    	 		if (  $trans->load(Yii::$app->request->post())       &&  $bureau->load(Yii::$app->request->post())         ) {
    	 			
    	 			$bien = Bien::find()->where(['codebien' => $code])->one();
    	 			if ($bien) {
    	 				
    	 				
    	 				//controle de date
    	 				
    	 				$tabSys = explode('/', $dte); //convertir en tableau dont le séparateur est /
    	 				$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
    	 				 
    	 				$tabPicker = explode('/', $trans->dt);
    	 				$secPicker= mktime(0, 0, 0, $tabPicker[1], $tabPicker[0], $tabPicker[2]);
    	 				 
    	 				if ($secSys >= $secPicker) {
    	 					$trans->codebien = $code;
    	 					$codBureau=$bureau->codebureau;
    	 					$trans->codebureau= $codBureau;
    	 					$dateTrans= $trans->dt;	
    	 					$bien->statutbien='transfere';
    	 					$trans->save();
    	 					$bien->save();
    	 					if ($trans->save()) {
    	 						
    	 						Yii::$app->getSession()->setFlash('success', 'Le transfert est éffectué avec succès');
    	 					   return $this->redirect(['transferer/view', 'codebien'=>$trans->codebien,'dt'=>$dateTrans,'codebureau'=>$trans->codebureau]);
    	 					}
    	 				}else {
    	 					Yii::$app->getSession()->setFlash('danger', 'La date du transfert est superieure à la date d aujourdhui');
    	 					return $this->redirect(['transfert']);
    	 				}
    	 				
    	 				
    	 			
    	 			
    	 				
    	 					
    	 			}
    	 			else {
    	 				Yii::$app->getSession()->setFlash('danger', 'Veuillez entrer un code valide s il vous plait');
    	 				return $this->redirect(['transfert']);
    	 			}
    	 			
    	 				
    	 			 
    	 		} 		
    	 		
    	 	
    	 			return $this->render('_formTransfert', [
    	 					'designationBien' => $des,
    	 					'structu' => $str,
    	 					'bureau1' => $bur,
    	 					'datTrans' => $datt,
    	 		             'nomStruct' =>$nomStruct,
    	 					'trans' =>$trans,
    	 					'dat' =>$dat,
    	 					'bureau' =>$bureau,
    	 			        
    	 					]);
    	 	  	 		
    	 		}
    	 		 
    	 		
    	 		////////////////////////////////////////////////////////////////////////////////
    	 		//Cette action fait le filtrage de la dependent dropdown list pour les structures par désignation
    	 		
    	 		public function actionListstruct($id)
    	 		{
    	 				
    	 				
    	 			$countStruct = Structure::find()
    	 			->where(['designation' => $id])
    	 			->count();
    	 		
    	 			$structures = Structure::find()
    	 			->where(['designation' => $id])
    	 			->all();
    	 		
    	 			if($countStruct > 0 )
    	 					
    	 			{
    	 				foreach($structures as $struc ){
    	 					echo "<option value='".$struc->designation."'>".$struc->designation."</option>";
    	 				}
    	 			}
    	 			else{
    	 				echo "<option> - </option>";
    	 			}
    	 		
    	 		}
    	 		
    	 		 
    	////////////////////////////////////////////////////////////////////////////////
    	//Cette action fait le filtrage de la dependent dropdown list pour les structures et bureaux
    	 
    	 		public function actionLists($id)
    	 		{
    	 			
    	 			
    	 			$countBureau = Bureau::find()
    	 			->where(['codestructure' => $id])
    	 			->count();
    	 		
    	 			$bureaux = Bureau::find()
    	 			->where(['codestructure' => $id])
    	 			->all();
    	 		      
    	 		if($countBureau > 0 )
    	 			
    	 			{
    	 				foreach($bureaux as $bureau ){
    	 					echo "<option value='".$bureau->codebureau."'>".$bureau->codebureau."</option>";
    	 				}
    	 			}
    	 			else{
    	 				echo "<option> - </option>";
    	 			}
    	 		
    	 		}
    	 		////////////////////////////////////////////////////////////////////////////////////////////////
    	 		
    	 		public function actionListmarque($id)
    	 		{
    	 				
    	 				
    	 			$countModele = Modele::find()
    	 			->where(['marque' => $id])
    	 			->count();
    	 		
    	 			$marques = Modele::find()
    	 			->where(['marque' => $id])
    	 			->all();
    	 		
    	 			if($countModele > 0 )
    	 					
    	 			{
    	 				foreach($marques as $modele ){
    	 					echo "<option value='".$modele->modele."'>".$modele->modele."</option>";
    	 				}
    	 			}
    	 			else{
    	 				echo "<option> - </option>";
    	 			}
    	 		
    	 		}
    	 		
    	 		//////////////////////////////////////////////////////////////////////////////////////////////////
    	 		
    	 		//Cette action fait le filtrage de la dependent dropdown list pour les familles et sous familles
    	 		
    	 		public function actionListfamille($id)
    	 		{
    	 				
    	 				
    	 			$countFamille = Sousfamille::find()
    	 			->where(['designationfamille' => $id])
    	 			->count();
    	 		
    	 			$familles = Sousfamille::find()
    	 			->where(['designationfamille' => $id])
    	 			->all();
    	 		
    	 			if($countFamille > 0 )
    	 					
    	 			{
    	 				foreach($familles as $sousfamille ){
    	 					echo "<option value='".$sousfamille->designationsousfamille."'>".$sousfamille->designationsousfamille."</option>";
    	 				}
    	 			}
    	 			else{
    	 				echo "<option> - </option>";
    	 			}
    	 		
    	 		}
    	 		
    	///////////////////////////////////////////////////////////////////////////////////////////////////

    	 		// cette action affiche les biens mis en instance et les affecter
    	 		public function actionListeaffecter(){
    	 		
    	 			
    	 			$affect = new Affecter;
    	 			$instance = new Instance;
    	 			$bureau = new Bureau;
    	 			$dat = new Dat;
    	 			$b=1; $y=0;
    	 			$searchInstance = new InstanceSearch();
    	 			$dataProvider = $searchInstance->search(Yii::$app->request->queryParams);
    	 			
    	 			$biens=$dataProvider->getModels();
    	 			$selection=(array)Yii::$app->request->post('selection');
    	 			 
    	 			 
    	 			 
    	 			foreach ($selection as $i){
    	 					
    	 				$affect = new Affecter;
    	 				$instance = new Instance;
    	 				$bureau = new Bureau;
    	 				$dat = new Dat;
    	 				$bien = new Bien;
    	 					
    	 					
    	 				if (   ($affect->load(Yii::$app->request->post()))   &&   ($dat->load(Yii::$app->request->post()))   &&    ($bureau->load(Yii::$app->request->post()))    ){
    	 			
    	 					$affect->codebien = $i;
    	 						
    	 					$dte=$dat->dt;
    	 					$affect->dt= $dte;
    	 					 
    	 					 
    	 					//controle de date
    	 					$dateSysteme = date('d/m/Y'); //rÃ©cupÃ©rer date systeme
    	 					$tabSys = explode('/', $dateSysteme); //convertir en tableau dont le sÃ©parateur est /
    	 					$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
    	 					 
    	 					$tabPicker = explode('/', $dte);
    	 					$secPicker= mktime(0, 0, 0, $tabPicker[1], $tabPicker[0], $tabPicker[2]);
    	 					 
    	 					if ($secSys >= $secPicker) {
    	 						$bien = Bien::find()->where(['codebien' => $i])->one();
    	 						$bien->statutbien = 'affecte';
    	 						$instance = Instance::find()->where(['codebien' => $i])->one();
    	 						$instance->status = 'affecte';
    	 						$instance->save();
    	 						$bien->save();
    	 							
    	 						$dat->save();
    	 							
    	 						$codBureau=$bureau->codebureau;
    	 						$affect->codebureau= $codBureau;
    	 			
    	 			
    	 						$affect->save();
    	 			
    	 			
    	 			
    	 			
    	 			
    	 					}else {
    	 						Yii::$app->getSession()->setFlash('danger', 'La date que vous avez entrÃ©e est superieure Ã  celle du systÃ¨me. Veuillez entrer une date valide s il vous plait');
    	 						return $this->redirect(['listeaffecter']);
    	 			
    	 					}
    	 					 
    	 				}
    	 			
    	 				$b=0;
    	 			}
    	 			if ($b==0) {
    	 				Yii::$app->getSession()->setFlash('info', 'L affectation a Ã©tÃ© bien faite.');
    	 				return $this->redirect(['biensaffectes']);
    	 			
    	 			}
    	 				
    	 			$instance = new Instance;
    	 			
    	 			$dat = new Dat;
    	 			$b=1; $y=0;
    	 			$searchInstance = new InstanceSearch();
    	 			$dataProvider = $searchInstance->search(Yii::$app->request->queryParams);
    	 				
    	 			$biens=$dataProvider->getModels();
    	 				
    	 			foreach ($biens as $bien){
    	 				 
    	 				$bi = Bien::find()->where(['codebien' => $bien->codebien])->one();
    	 				$data[$y] = ['codebien'=>$bien->codebien,'designationbien'=> $bi->designationbien, 'codesousfamille'=> $bi->codesousfamille, 'numfacture'=>$bi->numfacture, 'dt'=>$bien->dt];
    	 				$y++;
    	 					
    	 				$dataProviderRes = new ArrayDataProvider([
    	 						'key' =>'codebien',
    	 						'allModels' => $data,
    	 						'sort' => [
    	 						'attributes' => ['codebien', 'designationbien', 'codesousfamille','numfacture','dt'],
    	 						],
    	 						]);
    	 					
    	 					
    	 				$dataProvider=$dataProviderRes;
    	 			}
    	 				
    	 			return $this->render('vueListeAaffecter', [
    	 					'searchInstance' => $searchInstance,
    	 					'dataProvider' => $dataProvider,
    	 					'affect' => $affect,
    	 					'dat' => $dat,
    	 					'bureau' => $bureau,
    	 					]);
    	 			
    	 			
    	 			
    	 			/*$affect = new Affecter;
    	 			$data=null;
    	 			$instance = new Instance;
    	 			$bureau = new Bureau;
    	 			$dat = new Dat;
    	 			$b=1; $y=0;
    	 			$searchInstance = new InstanceSearch();
    	 			$dataProvider = $searchInstance->search(Yii::$app->request->queryParams);

    	 			$biens=$dataProvider->getModels();
    	 		$selection=(array)Yii::$app->request->post('selection');
    	 	    	 		
    	 	    
    	 	    	 		
    	 		foreach ($selection as $i){
    	 			
    	 			$affect = new Affecter;
    	 			$instance = new Instance;
    	 			$bureau = new Bureau;
    	 			$dat = new Dat;
    	 			$bien = new Bien;
    	 			
    	 			
    	 			if (   ($affect->load(Yii::$app->request->post()))   &&   ($dat->load(Yii::$app->request->post()))   &&    ($bureau->load(Yii::$app->request->post()))    ){
    	 				
    	 		           $affect->codebien = $i;
    	 				   
    	 					$dte=$dat->dt;
    	 					$affect->dt= $dte;
    	 					
    	 					
    	 					//controle de date
    	 					$dateSysteme = date('d/m/Y'); //récupérer date systeme
    	 					$tabSys = explode('/', $dateSysteme); //convertir en tableau dont le séparateur est /
    	 					$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
    	 					
    	 					$tabPicker = explode('/', $dte);
    	 					$secPicker= mktime(0, 0, 0, $tabPicker[1], $tabPicker[0], $tabPicker[2]);
    	 					
    	 					if ($secSys >= $secPicker) {
    	 						$bien = Bien::find()->where(['codebien' => $i])->one();
    	 						$bien->statutbien = 'affecte';
    	 						$instance = Instance::find()->where(['codebien' => $i])->one();
    	 						$instance->status = 'affecte';
    	 						$instance->save();
    	 						$bien->save();
    	 						 
    	 						$dat->save();
    	 						 
    	 						$codBureau=$bureau->codebureau;
    	 						$affect->codebureau= $codBureau;
    	 						
    	 						$affect->save();
    	 								
    	 					}else {
    	 						Yii::$app->getSession()->setFlash('danger', 'La date que vous avez entrée est superieure à celle du système. Veuillez entrer une date valide s il vous plait');
    	 						return $this->redirect(['listeaffecter']);
    	 						
    	 					}
    	 					
    	 				}
    	 				
    	 					$b=0;
    	 			}
    	 			if ($b==0) {
    	 				Yii::$app->getSession()->setFlash('info', 'L affectation a été bien faite.');
    	 				return $this->redirect(['biensaffectes']);
    	 				
    	 			}
    	 			
    	 			$instance = new Instance;
    	 			
    	 			$dat = new Dat;
    	 			$b=1; $y=0;
    	 			$searchInstance = new InstanceSearch();
    	 			$dataProvider = $searchInstance->search(Yii::$app->request->queryParams);
    	 			
    	 			$biens=$dataProvider->getModels();
    	 			
    	 				foreach ($biens as $bien){
    	 					
    	 					$searchb = new BienSearch();
    	 					$dataProviderb = $searchb->search(Yii::$app->request->queryParams);
    	 					 
    	 					$biensb=$dataProviderb->getModels();
    	 					
    	 					foreach ($biensb as $bi){
    	 						echo "code = ".$bien->codebien;
    	 						if($bi->codebien==$bien->codebien)
    	 						{
    	 					
    	 						
    	 				
    	 					
    	 					//$bi = Bien::find()->where(['codebien' => $bien->codebien])->one();
    	 			$data[$y] = ['codebien'=>$bien->codebien,'designationbien'=> $bi->designationbien, 'codesousfamille'=> $bi->codesousfamille, 'numfacture'=>$bi->numfacture, 'dt'=>$bien->dt];
    	 			$y++;
    	 						}
    	 					}
    	 			$dataProviderRes = new ArrayDataProvider([
    	 					'key' =>'codebien',
    	 					'allModels' => $data,
    	 					'sort' => [
    	 					'attributes' => ['codebien', 'designationbien', 'codesousfamille','numfacture','dt'],
    	 					],
    	 					]);
    	 			
    	 			
    	 			$dataProvider=$dataProviderRes;
    	 			}
    	 			
    	 			return $this->render('vueListeAaffecter', [
    	 					'searchInstance' => $searchInstance,
    	 					'dataProvider' => $dataProvider,
    	 					'affect' => $affect,
    	 					'dat' => $dat,
    	 					'bureau' => $bureau,
    	 					]);*/
    	 			
    	 		}
    	 		
    	
    	 		
    	 		
    	 		
    	 		
    	 		
    	///////////////////////////////////////////////////////////////////////////////////////

    	 		//cette action implémente l'historique
    	 		public function actionHistorique(){
    	 		
    	 		
    	 			$code = Yii::$app->request->post('code');
    	 			$searchModel = new BienSearchHistorique();
    	 			$dataProvider = $searchModel->search(Yii::$app->request->queryParams,$code);
    	 			$des = '';
    	 			$data=null;
    	 			$i = 0;
    	 			
    	 			if ($code) {
    	 			
    	 				
    	 				// rechercher lacquisition
    	 				$searchModel = new BienSearchHistorique();
    	 				$dataProvider = $searchModel->search(Yii::$app->request->queryParams,$code);
    	 				$biens=$dataProvider->getModels();
    	 				foreach ($biens as $bien)
    	 				{       
    	 					if ($bien) {
    	 						$des = $bien->designationbien;
    	 						$datAcqui = $bien->dateacquisition;
    	 						 
    	 						$data[$i] = ['date mouvement' => $datAcqui, 'mouvement' => 'acquis'];
    	 						$i++;
    	 						
    	 						
    	 					}
    	 					
    	 				}
    	 				$dataProviderRes = new ArrayDataProvider([
    	 						//'key' =>$code,
    	 						'allModels' => $data,
    	 						'sort' => [
    	 						'attributes' => ['date mouvement', 'mouvement'],
    	 						],
    	 						]);
    	 				
    	 				 
    	 				$dataProvider=$dataProviderRes;
    	 				
    	 				// rechercher laffectation
    	 				$searchModel = new AffecterSearch();
    	 				$dataProvider = $searchModel->searchHistorique(Yii::$app->request->queryParams,$code);
    	 				$biens=$dataProvider->getModels();
    	 				foreach ($biens as $bien)
    	 				{
    	 					if ($bien) {
    	 						$datAffect = $bien->dt;
    	 						$codebureau=$bien->codebureau;
    	 						 
    	 						$data[$i] = ['date mouvement' => $datAffect, 'mouvement' => 'affecté','affecté vers'=>$codebureau];
    	 						$i++;
    	 						
    	 					
    	 					}
    	 				
    	 				}
    	 				$dataProviderRes = new ArrayDataProvider([
    	 						//'key' =>$code,
    	 						'allModels' => $data,
    	 						'sort' => [
    	 						'attributes' => ['date mouvement', 'mouvement'],
    	 						],
    	 						]);
    	 				
    	 				$dataProvider=$dataProviderRes;
    	 				
    	 				// rechercher la mise en instance
    	 				$searchModel = new InstanceSearch();
    	 				$dataProvider = $searchModel->searchHistorique(Yii::$app->request->queryParams,$code);
    	 				$biens=$dataProvider->getModels();
    	 				foreach ($biens as $bien)
    	 				{
    	 					 if ($bien) {
    	 					 
    	 					 	$datInst = $bien->dt;
    	 					 	
    	 					 	$data[$i] = ['date mouvement' => $datInst, 'mouvement' => 'mis en instance'];
    	 					 	$i++;
    	 					 	
    	 					 	
    	 					 }
    	 					
    	 				}
    	 				$dataProviderRes = new ArrayDataProvider([
    	 						//'key' =>$code,
    	 						'allModels' => $data,
    	 						'sort' => [
    	 						'attributes' => ['date mouvement', 'mouvement'],
    	 						],
    	 						]);
    	 					
    	 				$dataProvider=$dataProviderRes;
    	 				
    	 				// rechercher le transfert
    	 				
    	 				$biens = Transferer::find()
    	 				->where(['codebien' => $code])
    	 				
    	 				->orderBy(['dt'=> SORT_ASC])
    	 				->all();
    	 				
    	 				$cont = Transferer::find()
    	 				->where(['codebien' => $code])
    	 				->orderBy('dt')
    	 				->count();
    	 			
    	 				$y=0;
    	 				if ($cont>1) {
    	 					
    	 					foreach ($biens as $bien){
    	 						if ($bien) {
    	 							//construire tableau des dates et des bureaux ordonné
    	 							$datTrans = $bien->dt;
    	 							$dat[$y] = $bien->dt;
    	 							$bureau[$y] = $bien->codebureau;
    	 							
    	 							$y++;
    	 						}
    	 					}
    	 					//manipuler le tableau des bureaux
    	 					for ($y=0;$y<$cont-1;$y++){
    	 						$datDe=$dat[$y];
    	 						$datVer=$dat[$y+1];
    	 						
    	 						$burDe=$bureau[$y];
    	 						$burVer=$bureau[$y+1];
    	 						
    	 						$data[$i] = ['date mouvement' => $datVer, 'mouvement' => 'transféré','transféré de'=>$burDe, 'transféré vers'=> $burVer];
    	 					
    	 						
    	 					$i++;
    	 					
    	 					}
    	 					
    	 				}
    	 				else {
    	 					//si on a un seul transfert
    	 					 if ($cont==1) {
    	 					 	// on fait la recherche ds la table affecter
    	 					 	$bienAffect = Affecter::find()->where(['codebien' => $code])->one();
    	 					 	foreach ($biens as $bien){
    	 					 		$datVer = $bien->dt;
    	 					 	
    	 					 		$burDe = $bienAffect->codebureau;
    	 					 		$burVer= $bien->codebureau;
    	 					 	}
    	 					 	
    	 					 	
    	 					 	$data[$i] = ['date mouvement' => $datVer, 'mouvement' => 'transféré','transféré de'=>$burDe, 'transféré vers'=> $burVer];
    	 					 		
    	 					 	$i++;
    	 					 }
    	 				
    	 				}
    	 				
    	 				
    	 			$dataProviderRes = new ArrayDataProvider([
    	 						//'key' =>$code,
    	 						'allModels' => $data,
    	 						'sort' => [
    	 						'attributes' => ['date mouvement', 'mouvement','transféré de','transféré vers'],
    	 						],
    	 						]);
    	 				 
    	 				$dataProvider=$dataProviderRes;
    	 				
    	 				
    	 			
    	 				
    	 				// rechercher la réparation
    	 				$searchModel = new ReparerSearch();
    	 				$dataProvider = $searchModel->searchHistorique(Yii::$app->request->queryParams,$code);
    	 				$biens=$dataProvider->getModels();
    	 				foreach ($biens as $bien)
    	 				{
    	 				   if ($bien) {
    	 				   	$datSorti = $bien->dt;
    	 				   	$datEntre = $bien->datefin;
    	 				   	$data[$i] = ['date mouvement' => $datSorti, 'mouvement' => 'en réparation', 'date fin reparation'=>$datEntre];
    	 				   	$i++;
    	 				   	
    	 				  
    	 				   }
    	 				
    	 				}
    	 				$dataProviderRes = new ArrayDataProvider([
    	 						//'key' =>$code,
    	 						'allModels' => $data,
    	 						'sort' => [
    	 						'attributes' => ['date mouvement', 'mouvement','date fin reparation'],
    	 						],
    	 						]);
    	 				
    	 				$dataProvider=$dataProviderRes;
    	 				
    	 				// rechercher la réforme
    	 				$searchModel = new ReformerSearch();
    	 				$dataProvider = $searchModel->searchHistorique(Yii::$app->request->queryParams,$code);
    	 				$biens=$dataProvider->getModels();
    	 				foreach ($biens as $bien)
    	 				{
    	 					if ($bien) {
    	 						$datref = $bien->datereforme;
    	 						$typeref= $bien->typereforme;
    	 						$data[$i] = ['date mouvement' => $datref, 'mouvement' => 'réformé', 'type reforme'=>$typeref];
    	 						$i++;
    	 				
    	 						
    	 					}
    	 					 
    	 				}
    	 				$dataProviderRes = new ArrayDataProvider([
    	 						//'key' =>$code,
    	 						'allModels' => $data,
    	 						'sort' => [
    	 						'attributes' => ['date mouvement', 'mouvement'],
    	 						],
    	 						]);
    	 				
    	 				$dataProvider=$dataProviderRes;
    	 	
    	 			}
    	 			
    	 			return $this->render('historique', [
    	 					'designationBien' => $des,
    	 					'dataProvider' => $dataProvider,
    	 					]);
    	 			
                          }
    	 	

                          
                /////////////////////////////////////////////////////
                //cette fonction retourne un tab de transfert "de ->vers"
                protected function dernierTransfert($code,$burVer, $burDe){
                
                	$burDe = '';
                	$burVer = '';
                	
                		$models = Transferer::find()
                		->where(['codebien' => $code])
                		//->orderBy(['dt'=> SORT_DESC])
                		->orderBy(['dt'=> SORT_ASC])
                		->all();
                		if ($model) {
                			$cont = Transferer::find()
                			->where(['codebien' => $code])
                			->orderBy('dt')
                			->count();
                			
                			$i=0;
                			
                			foreach ($models as $model){
                				
                				$bureau[$i] = $model->codebureau;
                				$i++;
                			}
                			
                			for ($i=0;$i<$cont-1;$i++){
                				
                				$burDe=$bureau[$i];
                				$burVer=$bureau[$i+1];
                				 
                			}
                		}
                		
                	return  $burVer && $burDe;
                		
                }         
           /***********************************************************************************/
                
                //cette action calcule le nombre des biens par status (en fonction, réparation....)
                
                public function actionStataparstatu(){
                	$connection = new \yii\db\Connection([
                			'dsn' => 'oci:dbname= //localhost/orcl',
                			'username' => 'immo_bdd',
                			'password' => 'immo2015',
                			]);
                	$connection->open();
                	$stru = new Structure;
                	$cpt = 0;
                	$fonc= null;$inst= null;$repa= null;$cede= null;$rebu= null;$dispar= null;$don = null;
                	$debut= new Dat; $fin = new Dat; 
                	
                	$dateSysteme = date('d/m/Y'); //récupérer date systeme
                	$tabSys = explode('/', $dateSysteme); //convertir en tableau dont le séparateur est /
                	$secSys= mktime(0, 0, 0, $tabSys[1], $tabSys[0], $tabSys[2]); //convertir la date en seconde
                	    	 
                	
                	// le cas d'affectation
                	if  (($stru->load(Yii::$app->request->post())) &&   ($debut->load(Yii::$app->request->post()))   &&    ($fin->load(Yii::$app->request->post()))     ) {
                		$datDebut = $debut->dt;
                		$datFin = $fin->datefin;
                		
                		$tabDebut = explode('/', $datDebut);
                		$secDebut= mktime(0, 0, 0, $tabDebut[1], $tabDebut[0], $tabDebut[2]);
                		
                		$datFin = $fin->dt;
                		$tabFin = explode('/', 	$datFin );
                		$secFin= mktime(0, 0, 0, $tabFin[1], $tabFin[0], $tabFin[2]);
                		 
                		if (($secDebut <=$secFin)  && ($secDebut <= $secSys)  &&  ($secDebut <= $secSys) ) {
                 		$strDes =  $stru->designation;
                 		$sieg= strcmp ( $strDes , "siege" );
                		$cherag = strcmp ( $strDes , "Succursale Cheraga" );
                		$annab = strcmp ( $strDes , "Succursale Annaba" );
                		$oran = strcmp ( $strDes , "Succursale Oran" );
                		$biens = Affecter::find()->all();
                	//$biens = Affecter::find()->where(['and',  'dt'<=$datFin , "dt">='31/08/15'])->all();
                	//$command = $connection->createCommand ('select * from "affecter" where "codebien"=21845200031 ')->queryOne();
                	
                      
                		if ($sieg ==0) {               			
                			foreach ($biens as $bien){
                				$bur = $bien->codebureau;
                				$test= $bur[1];
                				$cmp = strcmp ( $test , "1" );
                				if ($cmp == 0) {
                					$cpt++;
                				}
                			}
                			$fonc = $cpt;
                		
                		}
                		elseif ($cherag == 0){
                			foreach ($biens as $bien){
                				$bur = $bien->codebureau;
                				$test= $bur[1];
                				$cmp = strcmp ( $test , "2" );
                				if ($cmp == 0) {
                					$cpt++;
                				}
                			}
                			$fonc = $cpt;
                		}
                		elseif ($annab==0){
                			foreach ($biens as $bien){
                				$bur = $bien->codebureau;
                				$test= $bur[1];
                				$cmp = strcmp ( $test , "3" );
                				if ($cmp == 0) {
                					$cpt++;
                				}
                			}
                			$fonc = $cpt;
                		}
                		elseif ($oran==0){
                			foreach ($biens as $bien){
                				$bur = $bien->codebureau;
                				$test= $bur[1];
                				$cmp = strcmp ( $test , "4" );
                				if ($cmp == 0) {
                					$cpt++;
                				}
                			}
                			$fonc = $cpt;
                		}
                		else {
                			$cpt++;
                			$fonc = $cpt;
                		}
                	
                	//le cas de mise en instance
                	$inst = (int)Instance::find()->where(['codestructure' => $stru->designation])->count();
                 	$repa = (int)Reparer::find()->where(['codestructure' => $stru->designation])->count(); 
                  $cede = (int)Reformer::find()->where(['typereforme' => "Cession",'codestructure'=>$stru->designation])->count();
                
                	$rebu = (int)Reformer::find()->where(['typereforme' => "MAR",'codestructure'=>$stru->designation])->count();
                	$dispar = (int)Reformer::find()->where(['typereforme' => "Perdu",'codestructure'=>$stru->designation])->count();
                	$don = (int)Reformer::find()->where(['typereforme' => "Don",'codestructure'=>$stru->designation])->count();
                	}
                	else{
                		Yii::$app->getSession()->setFlash('danger', 'La date fin ne doit pas être supérieure à la date début');
                		return $this->render('statParStatu',[
                				'stru' => $stru, 'fonc'=>$fonc,'inst'=>$inst,'repa'=>$repa,'cede'=>$cede,
                				'rebu'=>$rebu,'dispar'=>$dispar,'don'=>$don,
                				 ]);
                	}
                	}
                	return $this->render('statParStatu',[
    	 					'stru' => $stru,
                			'fonc'=>$fonc,
                			'inst'=>$inst,
                			'repa'=>$repa,
                			'cede'=>$cede,
                			'rebu'=>$rebu,
                			'dispar'=>$dispar,
                			'don'=>$don,
                			'debut'=>$debut,
                			'fin'=>$fin,
    	 					]);
                }
                
                
                /***********************************************************************************/
                
                //cette action calcule les investissements par compte
                
                public function actionStatinvest(){
                	
                	$stru = new Structure; //$debut= new Dat; $fin = new Dat; 
                	$MaterielInformatique=null; $TerrainsDeConstruction=null;
                	$MaterielAutomobile = null; $MobilierDeBureau=null;$total=0;$prix=0;$MaterielInformatique=0;
                //	if  (($stru->load(Yii::$app->request->post())) &&   ($debut->load(Yii::$app->request->post())) 
                //	  &&    ($fin->load(Yii::$app->request->post()))     ) {
                	if  (   ($stru->load(Yii::$app->request->post()))     ) {
                	         
                       $Fami452 = Famille::find()->where(['codecomptecomptable' => "218452"])->all();
                       
                       foreach ($Fami452 as $f452){
                       	$codfam = $f452->codefamille;
                        $SousFam= Sousfamille::find()->where(['codefamille' => $codfam])->all();
                        foreach ($SousFam as $souFamillle){
                        	$codSouFam = $souFamillle->codesousfamille;
                        	
                        	$biens = Bien::find()->where(['codesousfamille' => $codSouFam])->all();
                        	foreach ($biens as $bien){
                        		$prix = $bien->prixachat;
                        		$MaterielInformatique= $MaterielInformatique+$prix;
                        	
                        		
                        		
                        	}
                        	
                        }
                       	
                       }
                       
                       //traiter 2eme compte
                       $Fami2110 = Famille::find()->where(['codecomptecomptable' => "2110"])->all();
                        
                       foreach ($Fami2110 as $f2110){
                       	$codfam = $f2110->codefamille;
                       	$SousFam= Sousfamille::find()->where(['codefamille' => $codfam])->all();
                       	foreach ($SousFam as $souFamillle){
                       		$codSouFam = $souFamillle->codesousfamille;
                       		 
                       		$biens = Bien::find()->where(['codesousfamille' => $codSouFam])->all();
                       		foreach ($biens as $bien){
                       			$prix = $bien->prixachat;
                       			$TerrainsDeConstruction= $TerrainsDeConstruction+$prix;
                       		
                       
                       		}
                       		 
                       	}
                       
                       }
                       
                       //traiter 3eme compte
                       
                       $Fami218440 = Famille::find()->where(['codecomptecomptable' => "218440"])->all();
                       
                       foreach ($Fami218440 as $f218440){
                       	$codfam = $f218440->codefamille;
                       	$SousFam= Sousfamille::find()->where(['codefamille' => $codfam])->all();
                       	foreach ($SousFam as $souFamillle){
                       		$codSouFam = $souFamillle->codesousfamille;
                       
                       		$biens = Bien::find()->where(['codesousfamille' => $codSouFam])->all();
                       		foreach ($biens as $bien){
                       			$prix = $bien->prixachat;
                       			$MaterielAutomobile= $MaterielAutomobile+$prix;
                       			 
                       			 
                       		}
                       
                       	}
                       	 
                       }
                       
                       //traiter 4eme compte
                                   
                       $Fami218450 = Famille::find()->where(['codecomptecomptable' => "218450"])->all();
                        
                       foreach ($Fami218450 as $f218450){
                       	$codfam = $f218450->codefamille;
                       	$SousFam= Sousfamille::find()->where(['codefamille' => $codfam])->all();
                       	foreach ($SousFam as $souFamillle){
                       		$codSouFam = $souFamillle->codesousfamille;
                       		 
                       		$biens = Bien::find()->where(['codesousfamille' => $codSouFam])->all();
                       		foreach ($biens as $bien){
                       			$prix = $bien->prixachat;
                       			$MobilierDeBureau= $MobilierDeBureau+$prix;
                       			
                       		}
                       		 
                       	}
                       	 
                       }   
                       
                      $total =  $MaterielInformatique+$TerrainsDeConstruction+$MaterielAutomobile+$MobilierDeBureau;
                       
                	}
                		 
                	return $this->render('statInvest',[
                			'stru' => $stru,
                  			//'debut'=>$debut,
                			//'fin'=>$fin,
                			'MaterielInformatique'=>$MaterielInformatique,
                			'TerrainsDeConstruction'=>$TerrainsDeConstruction,
                			'MaterielAutomobile'=>$MaterielAutomobile,
                			'MobilierDeBureau'=>$MobilierDeBureau,
                			'total'=>$total,
                			]);
                	
                }   
                

                
                
                
                
                /*******************************************************
                 * 
                 * 
                 * 
                 * 
                 * FONCTION SIMOS 12/09/2015
                 * 
                 * 
                 * 
                 * 
                 */


                public function cherchercomptebien($code)
                {
                	$res=00;
                	$model= $this->findModel($code);
                	$searchModelsf = new SousFamilleSearch();
                	$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$model->codesousfamille);
                	$modelssf=$dataProvidersf->getModels();
                	 
                
                	foreach ($modelssf as $rowsF)
                	{
                		$searchModelsf = new SousFamilleSearch();
                		$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$model->codesousfamille);
                		$modelssf=$dataProvidersf->getModels();
                
                		foreach ($modelssf as $rowsF)
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
                              
                

                /*---------------------Calcule des amortissements   ---------------*/
                public function CalculeAmortissements ($datacq, $anneeexerc, $dureevie, $prixachat)
                {
                	 
                	/*****************           premiere annuité      *************/
                	$res=null;
                	$dateac=explode('/',$datacq);
                	$dateac[2]="20".$dateac[2];
                	if($dureevie!=0)
                	{
                		$taux = 1/$dureevie;
                	}
                	$jour=$dateac[0];
                	$mois=$dateac[1];
                	$nbrjours=0;
                	$amortcumul=0;
                	if($jour== '01')
                	{
                		if($mois=='01')
                		{
                			$nbrjours=360;
                		}
                		else {
                			$nbrmois=12-$mois;
                			$nbrjours=$nbrmois*30;
                		}
                	}
                	else
                	{
                		$nbrmois=12-$mois;
                		$nbrjours=$nbrmois*30;
                		$nbrjours=$nbrjours+ (30-$jour);
                
                	}
                
                	$dotationpremiere = $prixachat * $taux * $nbrjours/360 ;
                	$amortcumul=$dotationpremiere;
                	$res[0][0]=$dateac[2];
                	$res[0][1]=$prixachat;//number_format(intval($prixachat), 2, ',', ' ');
                	$res[0][2]=$dotationpremiere;//number_format($dotationpremiere, 2, ',', ' ');
                	$res[0][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                	$res[0][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
                
                	/***************************         autres annuites   **********************   *************/
                	$anneesuiv= $dateac[2]+1;
                	$i=1;
                	do {
                		 
                		if(($anneesuiv <= $anneeexerc-1)){
                			$dotations =  $prixachat * $taux;
                			$amortcumul=$amortcumul+ $dotations;
                			 
                			$res[$i][0]=$anneesuiv;
                			$res[$i][1]= $prixachat;//number_format($prixachat, 2, ',', ' ');
                			$res[$i][2]=$dotations;//number_format($dotations, 2, ',', ' ');
                			$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                			$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
                			$anneesuiv = $anneesuiv + 1;
                			$i++;
                		}
                
                	}
                	while(($anneesuiv <= $anneeexerc-1)&&($anneesuiv<($dateac[2]+$dureevie)));
                
                	/************** annuité derniere année *********************************/
                	
                	if($anneeexerc>=($dateac[2]+$dureevie))
                	{
                		$deniereanuitee= ((360 - $nbrjours)/360)*$taux*$prixachat;
                		$amortcumul=$amortcumul+ $deniereanuitee;
                		// echo "derniere annuite = ".$deniereanuitee;
                		$res[$i][0]=$anneesuiv;
                		$res[$i][1]= $prixachat;//number_format($prixachat, 2, ',', ' ');
                		$res[$i][2]= $deniereanuitee;//number_format($deniereanuitee, 2, ',', ' ');
                		$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                		$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
                	}
                	else
                	{
                		if($anneeexerc==date('Y'))
                		{
                			$datereforme=date('d/m/y');
                			$dateref=explode('/',$datereforme);
                			$dateref[2]="20".$dateref[2];
                			$jourref=$dateref[0];
                			$moisref=$dateref[1];
                			$nbrjoursref=0;
                			
                			if($jourref== '01')
                			{
                				if($moisref=='01')
                				{
                					$nbrjoursrf=360;
                				}
                				else
                				{
                					$nbrmoisref=12-$moisref;
                					$nbrjoursref=$nbrmoisref*30;
                				}
                			}
                			else
                			{
                				$nbrmoisref=12-$moisref;
                				$nbrjoursref=$nbrmoisref*30;
                				$nbrjoursref=$nbrjoursref + (30-$jourref);
                			}
                			$deniereanuitee= ((360 - $nbrjoursref)/360)*$taux*$prixachat;
                			
                			$amortcumul=$amortcumul+ $deniereanuitee;
                			$res[$i][0]=$anneesuiv;
                			$res[$i][1]= $prixachat;//number_format($prixachat, 2, ',', ' ');
                			$res[$i][2]=$deniereanuitee;//number_format($dotations, 2, ',', ' ');
                			$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                			$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
                		}
                		else 
                		{
                		$dotations =  $prixachat * $taux;
                		$amortcumul=$amortcumul+ $dotations;
                		$res[$i][0]=$anneesuiv;
                		$res[$i][1]= $prixachat;//number_format($prixachat, 2, ',', ' ');
                		$res[$i][2]=$dotations;//number_format($dotations, 2, ',', ' ');
                		$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                		$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
                		}
                	}
                	return $res;
                }
                
                
                
                /************************calcule amortissement bien réformé*********************************************/
                
                public function CalculeAmortissementsref ($datacq, $datereforme, $anneeexerc, $dureevie, $prixachat)
                {
                
                	/*****************           premiere annuité      *************/
                	$res=null;
                	$dateac=explode('/',$datacq);
                	$dateac[2]="20".$dateac[2];
                	$taux=0;
                	if($dureevie!=0)
                	{
                		$taux = 1/$dureevie;
                	}
                	$jour=$dateac[0];
                	 
                	$mois=$dateac[1];
                	$nbrjours=0;
                	$amortcumul=0;
                	if($jour== '01')
                	{
                		if($mois=='01')
                		{
                			$nbrjours=360;
                		}
                		else {
                			$nbrmois=12-$mois;
                			$nbrjours=$nbrmois*30;
                		}
                	}
                	else
                	{
                		$nbrmois=12-$mois;
                		$nbrjours=$nbrmois*30;
                		$nbrjours=$nbrjours + (30-$jour);
                
                	}
                
                	$dotationpremiere = $prixachat * $taux * $nbrjours/360 ;
                	$amortcumul=$dotationpremiere;
                	$res[0][0]=$dateac[2];
                	$res[0][1]=$prixachat;//number_format($prixachat, 2, ',', ' ');
                	$res[0][2]=$dotationpremiere;//number_format($dotationpremiere, 2, ',', ' ');
                	$res[0][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                	$res[0][4]=$prixachat-$amortcumul;
                
                	/***************************         autres annuites   **********************   *************/
                	$anneesuiv= $dateac[2]+1;
                	$i=1;
                	do {
                		$dotations =  $prixachat * $taux;
                		$amortcumul=$amortcumul+ $dotations;
                		$res[$i][0]=$anneesuiv;
                		$res[$i][1]=$prixachat;//number_format($prixachat, 2, ',', ' ');
                		$res[$i][2]=$dotations;//number_format($dotations, 2, ',', ' ');
                		$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                		$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
                		$anneesuiv = $anneesuiv + 1;
                		$i++;
                	}
                	while($anneesuiv <= $anneeexerc-1);
                
                	/************** annuité derniere année *********************************/
                
                	$dateref=explode('/',$datereforme);
                	$dateref[2]="20".$dateref[2];
                	$jourref=$dateref[0];
                	$moisref=$dateref[1];
                	$nbrjoursref=0;
                	 
                	if($jourref== '01')
                	{
                		if($moisref=='01')
                		{
                			$nbrjoursrf=360;
                		}
                		else
                		{
                			$nbrmoisref=12-$moisref;
                			$nbrjoursref=$nbrmoisref*30;
                		}
                	}
                	else
                	{
                		$nbrmoisref=12-$moisref;
                		$nbrjoursref=$nbrmoisref*30;
                		$nbrjoursref=$nbrjoursref + (30-$jourref);
                		 
                	}
                	$deniereanuitee= ((360 - $nbrjoursref)/360)*$taux*$prixachat;
                	 
                	$amortcumul=$amortcumul+ $deniereanuitee;
                	$res[$i][0]=$anneesuiv;
                	$res[$i][1]= $prixachat;//number_format($prixachat, 2, ',', ' ');
                	$res[$i][2]=$dotations;//number_format($dotations, 2, ',', ' ');
                	$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
                	$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
                	 
                	return $res;
                }              
                
                /**
                 * reforme existing bien
                 *
                 */
                 
                /*
                 * c bon
                */
                
                public function actionReformer()
                {
                	$model = new Bien();
                	//$model= $this->findModel('codebien');
                
                	if ($model->load(Yii::$app->request->post()))
                	{
                		/* afficher designation bien sans l'ecrire manuel*/
                		$datenr=$model->dateenr;
                		$cd=$model->codebien;
                
                		if($model2 = Bien::findOne($model->codebien) !== null){
                			 
                			$model= $this->findModel($model->codebien);
                			if( $model->statutbien=='reformer')
                			{
                				\Yii::$app->getSession()->setFlash('danger', 'Ce bien a été déjà réformé.');
                				 
                				$model = new Bien();
                				return $this->render('Reformer', ['model' => $model,]);
                			}
                			else
                			{
                				if($model->statutbien=='areformer')
                				{
                					\Yii::$app->getSession()->setFlash('danger', 'Le bien a été déjà  ajouté à la réforme.');
                					$model = new Bien();
                					return $this->render('Reformer', ['model' => $model,]);
                
                				}
                				else
                				{
                
                					$model->dateenr=$datenr;
                					 
                					if($model->dateenr!=null)
                					{
                						$datsep=explode('/',$model->dateenr);
                							
                						$ss=explode('20', $datsep[2]);
                						$datsep[2]=$ss[1];
                						$secdatenr= mktime(0, 0, 0, $datsep[1], $datsep[0], $datsep[2]);
                						$datacq=explode('/',$model->dateacquisition);
                						$secdatacq= mktime(0, 0, 0, $datacq[1], $datacq[0], $datacq[2]);
                						$auj=date('m/d/y');
                						$datauj=explode('/',$auj);
                						$secdatauj= mktime(0, 0, 0, $datauj[0], $datauj[1], $datauj[2]);
                
                						if(($secdatauj>=$secdatenr)&&($secdatenr>=$secdatacq))
                						{
                								
                
                							/*le bien ne doit pas etre terrain ou batimant*/
                								
                							$compte=$this->cherchercomptebien($model->codebien);
                							$cpt=substr(''.$compte, 0, 3);
                
                							if(($cpt!=("211")) && ($cpt!=("212")) && ($cpt!=("213")))
                							{
                									
                								$model->statutbien='areformer';
                
                								$imageName = $model->codebien;
                									
                								$model->file = UploadedFile::getInstance($model,'file');
                								 
                								if( $model->file!=null)
                								{
                									$model->file->saveAs( 'uploads/'.$imageName.'.'.$model->file->extension );
                										
                
                									$model->path=  'uploads/'.$imageName.'.'.$model->file->extension;
                								}
                								$model->save();
                								Yii::$app->getSession()->setFlash('success', 'Ajout avec succès');
                								$date=date('d/m/Y');
                								$model=new Bien();
                								$model->dateenr=$date;
                
                								return $this->render('Reformer', ['model' => $model,]);
                
                							}
                							else
                							{
                								\Yii::$app->getSession()->setFlash('danger', "le bien saisi n'est pas réformable.");
                
                							}
                						}
                						else
                						{
                							\Yii::$app->getSession()->setFlash('danger', 'SVP insérer une date valable.');
                
                						}
                					}
                				}
                			}
                
                		}
                		else
                		{
                			\Yii::$app->getSession()->setFlash('danger', "Le bien ".$cd." n'exite pas.");
                			$date=date('d/m/Y');
                			$model=new Bien();
                			$model->dateenr=$date;
                			return $this->render('Reformer', ['model' => $model,]);
                
                		}
                	}
                	else
                	{
                		$date=date('d/m/Y');
                
                		$model->dateenr=$date;
                		return $this->render('Reformer', ['model' => $model,]);
                	}
                	$date=date('d/m/Y');
                	$model->codebien=null;
                	$model->dateenr=$date;
                	return $this->render('Reformer', ['model' => $model,]);
                }
                               
                
                

                /**
                 *  c bon
                 * Valider liste des bien à reformer
                 *
                 */
                
                public function actionValider()
                {	$model = new Bien();
                
                if ($model->load(Yii::$app->request->post()))
                {
                	$selection=(array)Yii::$app->request->post('selection');//typecasting
                
                	foreach($selection as $id){
                
                		//$model = new Bien();
                		$modelRef= new Reforme();
                		$modelReformer= new Reformer();
                
                
                		$typeRef=$model->typereforme;
                		$dateeRef=$model->dateRef;
                
                		if(($dateeRef!=null)&&($typeRef!=null))
                		{
                
                			$model = $this->findModel($id);
                			$datsep=explode('/',$dateeRef);
                			$ss=explode('20', $datsep[2]);
                			$datsep[2]=$ss[1];
                			$secdtref= mktime(0, 0, 0, $datsep[1], $datsep[0], $datsep[2]);
                			$daten=explode('/',$model->dateenr);
                	   
                	   
                	   
                			$secdten= mktime(0, 0, 0, $daten[1], $daten[0], $daten[2]);
                			$auj=date('m/d/y');
                			$datau=explode('/',$auj);
                			$secdtau= mktime(0, 0, 0, $datau[0], $datau[1], $datau[2]);
                			 
                	   
                			if(($secdtau>=$secdtref)&&($secdtref >= $secdten))
                			{
                
                				$ress = explode('/',$dateeRef);
                				$annee=$ress[2];
                				$modelRef->datereforme = "".$annee ;
                
                				$modelRef->save();
                				 
                				if($model->statutbien=='reformer')
                				{
                	   	\Yii::$app->getSession()->setFlash('danger', 'Le bien'. $model->codebien.' à été dejà réformé.');
                	   	$date=date('d/m/Y');
                	   	$model=new Bien();
                	   	$model->dateRef=$date;
                	   	 
                				}
                				 
                				else
                				{
                					if(($dateeRef!=null)&&($typeRef!=null))
                					{
                	   		$datsep=explode('/',$dateeRef);
                
                
                	   		$model->statutbien='reformer';
                	   		$model->save();
                	   		$modelReformer->codebien = $model->codebien;
                	   		$modelReformer->datereforme="".$dateeRef;
                
                	   		if($typeRef==0){ $model->typereforme="Cession"; }
                	   		else if($typeRef==1) {$model->typereforme="Don";}
                	   		else if($typeRef==2) {$model->typereforme="Mise au rebut";}
                	   		else if($typeRef==3) {$model->typereforme="Perdu";}
                
                	   		$modelReformer->typereforme =$model->typereforme;
                	   		$modelReformer->save();
                	   		\Yii::$app->getSession()->setFlash('success', 'validation avec succée');
                	   		$date=date('d/m/Y');
                	   		$model=new Bien();
                	   		$model->dateRef=$date;
                	   		 
                					}
                					else
                					{
                						if($dateeRef==null)
                						{
                							\Yii::$app->getSession()->setFlash('danger', 'SVP insérer une date valable. ');
                							$date=date('d/m/Y');
                							$model=new Bien();
                							$model->dateRef=$date;
                						}
                						else
                						{
                							if($typeRef==null)
                							{
                								\Yii::$app->getSession()->setFlash('danger', 'SVP choisir le type de réforme. ');
                								$date=date('d/m/Y');
                								$model=new Bien();
                								$model->dateRef=$date;
                
                							}
                						}
                					}
                				}
                			}
                			else
                			{//($secdtau>=$secdtref)&&
                				if($secdtref < $secdten)
                				{
                					\Yii::$app->getSession()->setFlash('danger', "la date de réforme doit être supérieur à la date de proposition du bien à la réforme.");
                					$date=date('d/m/Y');
                					$model=new Bien();
                					$model->dateRef=$date;
                
                				}
                				else{
                					\Yii::$app->getSession()->setFlash('danger', 'SVP insérer une date valable. ');
                					$date=date('d/m/Y');
                					$model=new Bien();
                					$model->dateRef=$date;
                
                				}
                			}
                		}
                
                		else {
                			if($dateeRef==null)
                			{
                				\Yii::$app->getSession()->setFlash('danger', 'SVP insérer une date valable. ');
                				$date=date('d/m/Y');
                				$model=new Bien();
                				$model->dateRef=$date;
                
                			}
                			else
                			{
                				if($typeRef==null)
                				{
                						
                					\Yii::$app->getSession()->setFlash('danger', 'SVP choisir le type de réforme. ');
                					$date=date('d/m/Y');
                						
                						
                				}
                			}
                		}
                
                
                	}
                
                }
                else
                {
                	$model = new Bien();
                	$date=date('d/m/Y');
                
                	$model->dateRef=$date;
                
                	 
                }
                $model = new Bien();
                $date=date('d/m/Y');
                 
                $model->dateRef=$date;
                $searchModel = new BienSearchReforme();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                 
                return $this->render('valider',
                		[
                		'searchModel' => $searchModel,
                		'dataProvider' => $dataProvider,
                		'model' => $model,
                		]
                );
                }
                
                
                
                /* C bon
                 * index de reforme
                */
                public function actionIndexrefo()
                {
                	$searchModel = new BienSearchReforme();
                	$dataProvideraff = $searchModel->search(Yii::$app->request->queryParams);
                	$i=0;
                	$data=null;
                	$desunite=null;
                	$desstr=null;
                	$models=$dataProvideraff->getModels();
                	foreach ($models as $row)
                	{
                		$searchModelaff = new AffecterSearch();
                		$dataProvideraff = $searchModelaff->searchCod(Yii::$app->request->queryParams,$row->codebien);
                		$modelsaff=$dataProvideraff->getModels();
                		$y=0;
                		foreach ($modelsaff as $rowaff)
                		{
                			$searchModelbur = new BureauSearch();
                			$dataProviderbur = $searchModelbur->searchCod(Yii::$app->request->queryParams,$rowaff->codebureau);
                			$modelsbur=$dataProviderbur->getModels();
                			foreach ($modelsbur as $rowbur)
                			{
                				 
                				$trouv = false;
                				$codstr=$rowbur->codestructure;
                				do {
                					$searchModelstr = new StructureSearch();
                
                					$dataProviderstr = $searchModelstr->searchCod(Yii::$app->request->queryParams,$codstr);
                
                					$modelsstr=$dataProviderstr->getModels();
                					foreach ($modelsstr as $rowstr)
                					{
                						if($y==0) {$desstr=$rowstr->designation; $y++;}
                						$dataProviderstrt = $searchModelstr->searchCodtype(Yii::$app->request->queryParams,$rowstr->codestructure);
                						$modelsstrt=$dataProviderstrt->getModels();
                						if($dataProviderstrt->getTotalCount()!=0)
                						{
                							foreach ($modelsstrt as $rowstrt)
                							{
                								$desunite=$rowstrt->designation;
                								 
                							}
                							$trouv=true;
                						}
                						else
                						{
                							 
                							$codstr=$rowstr->codestructure_struct_chef;
                
                						}
                					}
                				}
                				while ($trouv==false);
                				$data[$i] = ['codebien' => $row->codebien, 'désignation'=>$row->designationbien, 'état'=>$row->etatbien,
                				'date enregistrement'=>$row->dateenr, 'structure'=>$desstr, 'unité'=>$desunite];
                				$i++;
                			}
                		}
                	}
                	$dataProviderRes = new ArrayDataProvider([
                			'allModels' => $data,
                			'key'=>'codebien',
                			'sort' => [
                			'attributes' => [
                
                			'codebien', 'désignation', 'état', 'date enregistrement', 'unité', 'structure'],],
                			]);
                
                	$dataProvider=$dataProviderRes;
                	return $this->render ('indexReforme',
                			[
                			'searchModel' => $searchModel,
                			'dataProvider' => $dataProvider,
                			 
                			]
                	);
                }
                                
                

                /*-----------------------transferer le montant d'investissements des biens reformés à des comptes de bien de reforme*/
                public function actionListcompteatrensferer()
                {
                	$model = new Bien();
                	$data= array();
                	$i=0;
                	$searchModel = new BienSearch();
                	$now = time();
                	$comptecomp=00;
                	$dattr=null;
                		
                	if ($model->load(Yii::$app->request->post()))
                	{
                
                		$dattr = $model->datetrensfert;
                		if($dattr <= date('Y'))
                		{
                			$selection=(array)Yii::$app->request->post('selection');
                			foreach($selection as $id)
                			{
                				$x=0;
                				$model= $this->findModel($id);
                				$searchModelsf = new SousFamilleSearch();
                				$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$model->codesousfamille);
                				$modelssf=$dataProvidersf->getModels();
                				 
                				foreach ($modelssf as $rowsF)
                				{
                					$searchModelF = new FamilleSearch();
                					$dataProviderF = $searchModelF->searchFC(Yii::$app->request->queryParams, $rowsF->codefamille);
                					$modelF=$dataProviderF->getModels();
                					foreach ($modelF as $rowF)
                					{
                						$searchModelCc = new ComptecomptableSearch();
                						$dataProviderCc = $searchModelCc->search(Yii::$app->request->queryParams,$rowF->codecomptecomptable);
                						$modelCc=$dataProviderCc->getModels();
                						 
                						foreach ($modelCc as $rowCc)
                						{
                							$searchModeltrans = new transfererrefinvSearch();
                
                							$dataProvidertrans = $searchModeltrans->searchRef(Yii::$app->request->queryParams,$rowCc->codecomptecomptable, $rowCc->comptecomptableref,$dattr);
                							$modeltrans=$dataProvidertrans->getModels();
                							if ($dataProvidertrans->getTotalCount()!= 0)
                							{
                								foreach ($modeltrans as $rowtrans)
                								{
                									$modeltresfer= new Transfererrefinv();
                									$modeltresfer->dat=$dattr;
                									$modeltresfer = Transfererrefinv::findOne(['codecomptecomptable' => $rowtrans->codecomptecomptable, 'dat' => $dattr]);
                									$resultat=$rowtrans->mnt;
                									$resultat = intval($resultat) + $model->prixachat;
                									$modeltresfer->mnt=''.($resultat);
                									$modeltresfer->save();
                									$model->statutbien='reformertransf';
                									if($dattr!=null)
                									{
                										$model->save();
                									}
                									else
                									{
                										if($x==0)
                										{
                											$x=1;
                											\Yii::$app->getSession()->setFlash('danger', "SVP saisir l'année de l'exercice.");
                												
                										}
                									}
                								}
                							}
                							else
                							{
                								$modeltresfer= new Transfererrefinv();
                								$modeltresfer->dat=$dattr;
                								$modeltresfer->codecomptecomptable= ''.($rowCc->codecomptecomptable);
                								$modeltresfer->codecomptecomptableref= ''.($rowCc->comptecomptableref);
                								$modeltresfer->mnt=''.($model->prixachat);
                								$modeltresfer->save();
                								$model->statutbien='reformertransf';
                								if($dattr!=null)
                								{
                									$model->save();
                								}
                								else
                								{
                
                									\Yii::$app->getSession()->setFlash('danger', "SVP saisir l'année de l'exercice.");
                										
                								}
                							}
                						}
                					}
                				}
                			}
                			 
                		}
                		else
                		{
                			\Yii::$app->getSession()->setFlash('danger', "L'année de l'exercice doit être égale ou inférieur à l'année actuelle.");
                		}
                	}
                
                	$searchModelC = new ComptecomptableSearch();
                	$dataProviderc = $searchModelC->searchC(Yii::$app->request->queryParams);
                	
                	$modelc = Comptecomptable::find()->all();
                	 
           
                	 
                	foreach ($modelc as $rowc)
                	{  
                		/*-----------------------------rechercher la famille --------------------------------------------*/
                		$modelRes= new Bien();
                		$searchModelF = new FamilleSearch();
                		$comptecomp=$rowc->codecomptecomptable;
                		$dataProviderF = $searchModelF->searchF(Yii::$app->request->queryParams, $comptecomp);
                		$modelF=$dataProviderF->getModels();
                		foreach ($modelF as $rowF)
                		{                   		
                			
                			 
                			/*----------------------Rechercher la sous famille ------------------------------------------*/
                			$searchModelsf = new SousFamilleSearch();
                			$dataProvidersf = $searchModelsf->search(Yii::$app->request->queryParams,$rowF->codefamille);
                			//$modelsf = Bien::findOne();
                			$modelssf=$dataProvidersf->getModels();
                			
                			foreach ($modelssf as $rowsF)
                			{ 
                				/*--------------------------Rechercher liste des biens------------------------------*/
                				$dataProvider = $searchModel->searchConsultationBienReforme(Yii::$app->request->queryParams, $rowsF->codesousfamille);
                				$models=$dataProvider->getModels();
                			
                				foreach ($models as $row)
                				{ 
                					//echo "-------sousfamille-".$row->codesousfamille;
                					//echo "-----------".$row->designationbien;
                					if($row->statutbien=="reformer"||$row->statutbien=="reformertransfamort")
                					{
                					/*---------------------------------  recherche type de reforme et la date de reforme ------------------------*/
                					$modelReformerSearch= new ReformerSearch();
                					$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
                					$modelb=$dataProviderRS->getModels();
                					$typ=null;
                					$ann=null;
                					foreach ($modelb as $rowb)
                					{ // echo "bien reformer ".$rowb->codebien;
                						$typ = $rowb->typereforme;
                						$ann = $rowb->datereforme;
                						
                						/*----------------------------------   tableau de resultat              -----------------------------------*/
                
                						$data[$i] = ['comptecomptable' => $comptecomp, 'codebien' => $rowb->codebien, 'designationbien'=>$row->designationbien, 'prixachat'=> $row->prixachat,'typereforme'=>$typ, 'dateRef'=>$ann];
                						$i++;
                					}
                			       }
                			    }
                			}
                		}
                	}
                	 
                	 
                	$dataProviderRes = new ArrayDataProvider([
                			'allModels' => $data,
                			'key'=>'codebien',
                			'sort' => [
                			'attributes' => [
                
                			'comptecomptable' ,
                			'codebien', 'designationbien', 'prixachat','typereforme', 'dateRef'],],
                			]);
                
                	$dataProvider=$dataProviderRes;
                	return $this->render ('listeBienAtransferer',
                			[
                			'searchModel' => $searchModel,
                			'dataProvider' => $dataProvider,
                			'model' => $model,
                			]
                	);
                }


                
                /*********************************************************************************************************/
                /*--------Transferer les compte amortissement vers les comptes dess amortissements de reforme------------*/
                public function actionTransferercompteamort()
                {
                	$model = new Bien();
                	//$now = time();
                	$i=0;
                	$anneeExercice=date('Y');
                
                	/*?????????????????????????????????????????????????????????????*/
                
                	 
                	if ($model->load(Yii::$app->request->post()))
                	{
                
                		$anneeExercice = $model->datetrensfert;
                		if(date("Y") < $anneeExercice)
                		{
                			\Yii::$app->getSession()->setFlash('danger', "SVP insérer une année inférieur ou égale à l'année actuelle");
                
                		}
                
                		else
                		{
                
                			$dattr = $model->datetrensfert;
                			$selection=(array)Yii::$app->request->post('selection');
                			 
                			foreach($selection as $id)
                			{
                				$x=0;
                				$resultat=0;
                				$model= $this->findModel($id);
                				$searchModelsf = new SousFamilleSearch();
                				$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$model->codesousfamille);
                				$modelssf=$dataProvidersf->getModels();
                
                				foreach ($modelssf as $rowsF)
                				{
                					$searchModelF = new FamilleSearch();
                					$dataProviderF = $searchModelF->searchFC(Yii::$app->request->queryParams, $rowsF->codefamille);
                					$modelF=$dataProviderF->getModels();
                					foreach ($modelF as $rowF)
                					{
                						$searchModelCc = new ComptecomptableamortSearch();
                						$dataProviderCc = $searchModelCc->search(Yii::$app->request->queryParams,$rowF->codecomptecomptable);
                						$modelCc=$dataProviderCc->getModels();
                
                						foreach ($modelCc as $rowCc)
                						{
                							if($rowCc->codecomptecomptable==$rowF->codecomptecomptable)
                							{
                								$resultat=0.00;
                
                								$searchModeltrans = new transfererrefinvamortSearch();
                								$dataProvidertrans = $searchModeltrans->searchRef(Yii::$app->request->queryParams,$rowCc->codecomptecomptable, $rowCc->comptecomptableref,$dattr);
                								$modeltrans=$dataProvidertrans->getModels();
                
                								if ($dataProvidertrans->getTotalCount()!= 0)
                								{
                									foreach($modeltrans as $rowtrans)
                									{
                										$modeltresfer= new Transfererrefinvamort();
                										$modeltresfer->dat=$dattr;
                										$modeltresfer = Transfererrefinvamort::findOne(['codecomptecomptable' => $rowtrans->codecomptecomptable, 'dat' => $dattr]);
                										$resultat= intval($rowtrans->mnt);
                
                										/**************************************************************************************************************
                										 *
                										*on calcule l'amortissement des comptes et on fait le transferer vers les coppte d'amortissement de reforme
                										*
                										***************************************************************************************************************/
                										$ref= new Reformer();
                										$modelReformerSearch= new ReformerSearch();
                										$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$model->codebien);
                										$modelb=$dataProviderRS->getModels();
                										foreach ($modelb as $rowsbb)
                										{
                											///
                											//$rowamort=$this->calculeAmort($model, $rowsbb->datereforme);
                											/*                                              On calcule l amortissement                               */
                
                											$dateref=$rowsbb->datereforme;
                											$anneeExercice=explode('/',$dateref);
                											$anneeExercice="20".$anneeExercice[2];
                											$datref=explode('/',$dateref);
                											$secdref= mktime(0, 0, 0, $datref[1], $datref[0], $datref[2]);
                
                											$datac=explode('/',$model->dateacquisition);
                											$dateStr=$datac[1].'/'.$datac[0].'/'.$datac[2];
                											$date2=new \DateTime($dateStr);
                											$dureevie=$model->dureevie;
                											date_add($date2,date_interval_create_from_date_string($dureevie."years"));
                											$dataamo=date_format($date2,"d/m/y");
                											$datsep2=explode('/',$dataamo);
                											$secdtamo= mktime(0, 0, 0, $datsep2[1], $datsep2[0], $datsep2[2]);
                
                											if($secdtamo<=$secdref)
                											{
                												$model->amortpratiquee=$model->prixachat;
                
                											}
                											else
                											{
                												$resamort=$this->CalculeAmortissementsref($model->dateacquisition,$dateref,$anneeExercice,$model->dureevie,$model->prixachat);
                												$model->amortpratiquee=$resamort[count($resamort)-1][3];
                											}
                
                
                											/*  $resamort=$this->CalculeAmortissements ($model->dateacquisition, $anneeExercice, $model->dureevie, $model->prixachat);
                											 $model->prixachat=$resamort[count($resamort)-1][1];
                											$model->amortpratiquee=$resamort[count($resamort)-1][2];
                											$model->actifbrut=$model->prixachat;
                											$model->valeurnet= ($model->actifbrut - $model->amortpratiquee);
                											echo "valeur nette = ".$model->valeurnet;*/
                											/*
                											 *  *  si le compte deja exite dans cet ann e on rajoute le resultat
                											**/
                											/*   A ne pas touché */
                
                
                											$resultat = intval($resultat) + intval($resamort[count($resamort)-1][3] );
                											$modeltresfer->mnt= ''.($resultat);
                											$modeltresfer->save();
                											if($dattr!=null)
                											{
                												if($model->statutbien=='reformertransf')
                												{
                
                													$model2= new Bien();
                													$model2= $this->findModel($model->codebien);
                													$model2->statutbien="reformertransfinvamort";
                													$model2->save();
                
                												}
                												else
                												{
                
                													$model2= new Bien();
                													$model2= $this->findModel($model->codebien);
                													$model2->statutbien="reformertransfamort";
                													$model2->save();
                
                												}
                
                											}
                
                											else
                											{
                												if($x==0)
                												{
                													$x=1;
                													\Yii::$app->getSession()->setFlash('danger', "SVP insérer l'année de réforme");
                												}
                											}
                										}
                									}
                								}
                								else
                								{
                									$modeltresfer= new Transfererrefinvamort();
                									$modeltresfer->dat=''.$dattr;
                									$modeltresfer->codecomptecomptable= ''.($rowCc->codecomptecomptable);
                									$modeltresfer->codecomptecomptableref= ''.($rowCc->comptecomptableref);
                									$ref= new Reformer();
                									$modelReformerSearch= new ReformerSearch();
                									$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$model->codebien);
                									$modelb=$dataProviderRS->getModels();
                									foreach ($modelb as $rowsbb)
                									{
                
                										$dateref=$rowsbb->datereforme;
                										$anneeExercice=explode('/',$dateref);
                										$anneeExercice="20".$anneeExercice[2];
                										$datref=explode('/',$dateref);
                										$secdref= mktime(0, 0, 0, $datref[1], $datref[0], $datref[2]);
                
                										//$resamort=$this->CalculeAmortissements ($model->dateacquisition, $anneeExercice, $model->dureevie, $model->prixachat);
                										$datac=explode('/',$model->dateacquisition);
                										$dateStr=$datac[1].'/'.$datac[0].'/'.$datac[2];
                										$date2=new \DateTime($dateStr);
                										$dureevie=$model->dureevie;
                										date_add($date2,date_interval_create_from_date_string($dureevie." years"));
                										$dataamo=date_format($date2,"d/m/y");
                										$datsep2=explode('/',$dataamo);
                										$secdtamo= mktime(0, 0, 0, $datsep2[1], $datsep2[0], $datsep2[2]);
                
                										if($secdtamo<=$secdref)
                										{
                											//$resamort=$this->CalculeAmortissements($row->dateacquisition, $anneeExercice, $row->dureevie, $row->prixachat);
                											$model->amortpratiquee=$model->prixachat;
                
                										}
                										else
                										{
                												
                
                											$resamort=$this->CalculeAmortissementsref($model->dateacquisition,$dateref,$anneeExercice,$model->dureevie,$model->prixachat);
                											$model->amortpratiquee=$resamort[count($resamort)-1][3];
                										}
                
                										//$model->amortpratiquee=$resamort[count($resamort)-1][2];
                
                									}
                									$modeltresfer->mnt=''.($model->amortpratiquee);
                									$modeltresfer->save();
                									if($dattr!=null)
                									{
                										if($model->statutbien=='reformertransf')
                										{
                											$model2= new Bien();
                											$model2= $this->findModel($model->codebien);
                											$model2->statutbien="reformertransfinvamort";
                											$model2->save();
                										}
                										else
                										{
                											$model2= new Bien();
                											$model2= $this->findModel($model->codebien);
                											$model2->statutbien="reformertransfamort";
                											$model2->save();
                										}
                									}
                									else
                									{
                										if($x==0)
                										{
                											$x=1;
                											\Yii::$app->getSession()->setFlash('info', "SVP insérer l'année de réforme");
                										}
                									}
                								}
                							}
                						}
                					}
                				}
                			}
                		}
                	}
                	 
                	/*??????????????????????????Pour initialiser le tableau ??????????????*/
                
                	$searchModel = new BienSearch();
                	$dataProvider = $searchModel->searchListeReformerAllAmort(Yii::$app->request->queryParams);
                	$models=$dataProvider->getModels();
                	$resamortpratiquee=null;
                	$resactifbrut=null;
                	$resvaleurnet= null;
                	$data=null;
                	foreach ($models as $row)
                	{
                		$ref= new Reformer();
                		$modelReformerSearch= new ReformerSearch();
                		$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
                		$modelb=$dataProviderRS->getModels();
                		foreach ($modelb as $rowsbb)
                		{
                			/*
                			 * 1. calculer date amortissement
                			* 2. comparaison (date amortissement , date reforme)
                			* if > on utilise date reforme
                			* si non date amortissement
                			* */
                			 
                			/*on recupere la date de reforme*/
                			 
                			$dateref=$rowsbb->datereforme;
                			$anneeExercice=explode('/',$dateref);
                			$anneeExercice="20".$anneeExercice[2];
                			$datref=explode('/',$dateref);
                			$secdref= mktime(0, 0, 0, $datref[1], $datref[0], $datref[2]);
                			 
                			/********************      annee amortissement               *********************/
                			$datac=explode('/',$row->dateacquisition);
                			$dateStr=$datac[1].'/'.$datac[0].'/'.$datac[2];;
                			$date2=new \DateTime($dateStr);
                			$dureevie=$row->dureevie;
                			date_add($date2,date_interval_create_from_date_string($dureevie." years"));
                			$dataamo=date_format($date2,"d/m/y");
                			$datsep2=explode('/',$dataamo);
                			$secdtamo= mktime(0, 0, 0, $datsep2[1], $datsep2[0], $datsep2[2]);
                			if($secdtamo<$secdref)
                			{
                				//$resamort=$this->CalculeAmortissements($row->dateacquisition, $anneeExercice, $row->dureevie, $row->prixachat);
                				$resamortpratiquee=$row->prixachat;
                				$resactifbrut=$row->prixachat;
                				$resvaleurnet= 0.00;
                			}
                			else
                			{
                				$resamort=$this->CalculeAmortissementsref($row->dateacquisition,$dateref,$anneeExercice,$row->dureevie,$row->prixachat);
                				$resactifbrut=$resamort[count($resamort)-1][1];
                				//	$row->dotation = $resamort[count($resamort)-1][2];
                				$resamortpratiquee=$resamort[count($resamort)-1][3];
                				$resvaleurnet=$resamort[count($resamort)-1][4];
                			}
                			//	date_add($date2,date_interval_create_from_date_string($annee." years"." ".$mois." months"." ".$jours." days"));
                		}
                
                		/*                                type et annee de reforme                                */
                
                		$modelReformerSearch = new ReformerSearch();
                		$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
                		$modelb=$dataProviderRS->getModels();
                		$typ=null;
                		$ann=null;
                		foreach ($modelb as $rowb)
                		{
                
                			$typ = $rowb->typereforme;
                			$ann = $rowb->datereforme;
                			$searchModelsf = new SousFamilleSearch();
                			$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$row->codesousfamille);
                			$modelssf=$dataProvidersf->getModels();
                			 
                			foreach ($modelssf as $rowsF)
                			{
                				$searchModelF = new FamilleSearch();
                				$dataProviderF = $searchModelF->searchFC(Yii::$app->request->queryParams, $rowsF->codefamille);
                				$modelF=$dataProviderF->getModels();
                				foreach ($modelF as $rowF)
                				{
                					$searchModelCc = new ComptecomptableSearch();
                					$dataProviderCc = $searchModelCc->search(Yii::$app->request->queryParams,$rowF->codecomptecomptable);
                					$modelCc=$dataProviderCc->getModels();
                					 
                					foreach ($modelCc as $rowCc)
                					{
                						 
                						$formatter = \Yii::$app->formatter;
                						$resactifbrut = number_format($resactifbrut, 2, ',', ' ');
                						$resamortpratiquee = number_format($resamortpratiquee, 2, ',', ' ');
                						$resvaleurnet = number_format($resvaleurnet, 2, ',', ' ');
                						 
                						$data[$i] = ['comptecomptable' => $rowCc->codecomptecomptable, 'codebien' => $row->codebien, 'designationbien'=>$row->designationbien,'typereforme'=>$typ, 'actifbrut'=>$resactifbrut,
                						'amortpratiquee'=>$resamortpratiquee,'valeurnet'=>$resvaleurnet, 'dateRef'=> $ann];
                						$i++;
                
                					}
                				}
                			}}
                	}
                	 
                	$dataProviderRes = new ArrayDataProvider([
                			'allModels' => $data,
                			'key'=>'codebien',
                			'sort' => [
                			'attributes' => [
                			'comptecomptable' ,'codebien', 'designationbien', 'typereforme','actifbrut','amortpratiquee','valeurnet', 'dateRef'],],
                			]);
                	 
                	$dataProvider=$dataProviderRes;
                	 
                	return $this->render('listecompteAmortAtransferer',
                			[
                			'searchModel' => $searchModel,
                			'dataProvider' => $dataProvider,
                			'model' => $model,
                			]
                	);
                }                
                


                /*********************************************************************************************************/
                /*--------                 consultation des amortissements par bien                    ------------*/
              
                public function actionAmortbien()
                {
                	$model = new Bien();
                	$data= array();
                	$searchModel = new BienSearch();
                	$i=0;
                	if ($model->load(Yii::$app->request->post()))
                	{
                		$model= $this->findModel($model->codebien);
                		$annactuel=date("Y") ;
                
                		$resultatfinal=$this->CalculeAmortissements ($model->dateacquisition, $annactuel, $model->dureevie, $model->prixachat);
                		 
                		/*--------------------------------------------------tableau de resultat---------------------------------------------*/
                		for($j=0; $j<count($resultatfinal); $j++)
                		{
                		$data[$i] = [   'année exercice'=>$resultatfinal[$j][0], 
                		'valeur brute'=>number_format($resultatfinal[$j][1], 2, ',', ' '),
                		'dotation'=>number_format($resultatfinal[$j][2], 2, ',', ' '),
                		'amortissements cumulés'=>number_format($resultatfinal[$j][3], 2, ',', ' '),
                		'valeur nette'=>number_format($resultatfinal[$j][4], 2, ',', ' ')];
                	     	$i++;
                		}
                	}
                
                		else
                		{
                		 
                		\Yii::$app->getSession()->setFlash('danger', "SVP insérer le code du bien.");
                		}
                
                		$dataProviderRes = new ArrayDataProvider([
                		'allModels' => $data,
                		'sort' => [
                		'attributes' => ['année exercice', 'valeur brute', 'dotation', 'amortissements cumulés', 'valeur nette'],
                		],
    			]);
                
    	$dataProvider=$dataProviderRes;
    	return $this->render ('amortparbien',
                		[
                		'searchModel' => $searchModel,
                		'dataProvider' => $dataProviderRes,
                				'model' => $model,
                				]
    	);
                }
 




                /*--------------------- journal global---------------*/
                /*
                 * consultation des amortissements journal global
                */
                
                public function actionJournalglobale()
                {
                	$comptecomp=null;
                	$model = new Bien();
                	$data= array();
                	$data=null;
                	$i=0;
                	$searchModel = new BienSearch();
                	$dataProvider = $searchModel->searchConsultationBien(Yii::$app->request->queryParams, '0');
                	$formatter = \Yii::$app->formatter;
                	$now = time();
                	$comptecomp=00;
                	$totalActif=0.00;
                	$totalDotation=0.00;
                	$totalAmort=0.00;
                	$totalvalNet=0.00;
                	 
                	if ($model->load(Yii::$app->request->post()))
                	{
                		$anneeExercice = $model->anneexercice;
                		
                		 
                	}
                	 
                
                	/*-----------------------------rechercher la famille --------------------------------------------*/
                	if ($model->load(Yii::$app->request->post()))
                	{
                		$modelRes= new Bien();
                		$searchModelF = new FamilleSearch();
                
                		$searchModelCc = new ComptecomptableSearch();
                		$dataProviderCc = $searchModelCc->searchC(Yii::$app->request->queryParams);
                		$modelCc=$dataProviderCc->getModels();
                		 
                		$modelCc = Comptecomptable::find()->all();
                
                		
                		foreach ($modelCc as $rowCc)
                		{
             
                			$comptecomp=0;
                			$totalActif=0;
                			$totalDotation=0;
                			$totalAmort=0;
                			$totalvalNet=0;
                			$comptecomp=$rowCc->codecomptecomptable;
                			$compte=$comptecomp;
                			$cpt=substr(''.$compte, 0, 3);
                			 
                			if(($cpt!=("211")))
                			{
                				
                				$dataProviderF = $searchModelF->searchF(Yii::$app->request->queryParams, $comptecomp);
                				$modelF=$dataProviderF->getModels();
                				foreach ($modelF as $rowF)
                				{
                					/*----------------------Rechercher la sous famille ------------------------------------------*/
                					$searchModelsf = new SousFamilleSearch();
                					$dataProvidersf = $searchModelsf->search(Yii::$app->request->queryParams,$rowF->codefamille);
                					$modelssf=$dataProvidersf->getModels();
                					foreach ($modelssf as $rowsF)
                					{  
                						/*--------------------------Rechercher liste des biens------------------------------*/
                						 
                						$dataProvider = $searchModel->searchConsultationBien(Yii::$app->request->queryParams, $rowsF->codesousfamille);
                						$models=$dataProvider->getModels();
                						
                						
                						foreach ($models as $row)
                						{   
                							$resultatfinal=$this->CalculeAmortissements ($row->dateacquisition, $anneeExercice, $row->dureevie, $row->prixachat);
                							$ind=count($resultatfinal)-1;
                							$totalActif= $resultatfinal[$ind][1]+$totalActif ;
                							$totalAmort=$totalAmort + $resultatfinal[$ind][3];
                							$totalvalNet=$totalvalNet+$resultatfinal[$ind][4];
                						}
                					}
                				}
                				 
                				 
                				/*----------------------------------------   tableau de resultat              -----------------------------------*/
                				 
                				if($totalActif != 0)
                				{
                					$formatter = \Yii::$app->formatter;
                					$totalActif = number_format($totalActif, 2, ',', ' ');
                					$totalAmort = number_format($totalAmort, 2, ',', ' ');
                					$totalvalNet = number_format($totalvalNet, 2, ',', ' ');
                					$data[$i] = ['compte comptable' => $comptecomp, 'designation compte'=>$rowCc->designationcomptecomptable,'valeur brute'=>$totalActif,
                					'amortissements cumulés'=>$totalAmort , 'valeur nette'=>$totalvalNet,];
                					 
                					$i++;
                				}
                			}
                		}
                		$dataProviderRes = new ArrayDataProvider([
                				'allModels' => $data,
                				'sort' => [
                				'attributes' => ['compte comptable', 'designation compte', 'valeur brute','dotation',
                				'amortissements cumulés','valeur nette',],
                				 
                				],
                				]);
                
                		$dataProvider=$dataProviderRes;
                	}
                	return $this->render ('journalglob',
                			[
                			'searchModel' => $searchModel,
                			'dataProvider' => $dataProvider,
                			'model' => $model,
                			]
                	);
                	 
                }

                
                public function actionEtatimmobien()
                {
                	$model = new Bien();
                	$data= array();
                	$i=0;
                	$searchModel = new BienSearch();
                	$dataProvider = $searchModel->searchConsultationBien(Yii::$app->request->queryParams, '0');
                
                	$now = time();
                	$comptecomp=00;
                	$totalActif=0.00;
                	$totalDotation=0.00;
                	$totalAmort=0.00;
                	$totalvalNet=0.00;
                
                	if ($model->load(Yii::$app->request->post()))
                	{
                		$comptecomp=$model->comptecomptable;
                		$anneeExercice = $model->anneexercice;
                		$compte=$comptecomp;
                		$cpt=substr(''.$compte, 0, 3);
                		 
                		if(($cpt==("211")) || ($cpt==("212")) || ($cpt==("213")))
                		{
                			\Yii::$app->getSession()->setFlash('danger', "SVP insérer un compte comptable amortissable.");
                
                			return $this->render ('etatImmoParBien',
                					[
                					'searchModel' => $searchModel,
                					'dataProvider' => $dataProvider,
                					'model' => $model,
                					]
                			);
                		}
                		 
                	}
                	 
                	/*-----------------------------rechercher la famille --------------------------------------------*/
                	$modelRes= new Bien();
                	$searchModelF = new FamilleSearch();
                	$dataProviderF = $searchModelF->searchF(Yii::$app->request->queryParams, $comptecomp);
                	$modelF=$dataProviderF->getModels();
                
                	foreach ($modelF as $rowF)
                	{
                		/*----------------------Rechercher la sous famille ------------------------------------------*/
                		$searchModelsf = new SousFamilleSearch();
                		$dataProvidersf = $searchModelsf->search(Yii::$app->request->queryParams,$rowF->codefamille);
                		$modelssf=$dataProvidersf->getModels();
                		foreach ($modelssf as $rowsF)
                		{
                			/*--------------------------Rechercher liste des biens------------------------------*/
                
                			$dataProvider = $searchModel->searchConsultationBien(Yii::$app->request->queryParams, $rowsF->codesousfamille);
                			$models=$dataProvider->getModels();
                			 
                			foreach ($models as $row)
                			{
                				$resultat=$this->CalculeAmortissements ($row->dateacquisition, $anneeExercice, $row->dureevie, $row->prixachat);
                				$long=count($resultat)-1;
                				/*----------------------------------------   tableau de resultat              -----------------------------------*/
                				$formatter = \Yii::$app->formatter;
                				$resultat[$long][1] = number_format($resultat[$long][1], 2, ',', ' ');
                				$resultat[$long][2] = number_format($resultat[$long][2], 2, ',', ' ');
                				$resultat[$long][3] = number_format($resultat[$long][3], 2, ',', ' ');
                				$resultat[$long][4]= number_format($resultat[$long][4], 2, ',', ' ');
                				$data[$i] = ['comptecomptable' => $comptecomp, 'codebien' => $row->codebien, 'designationbien'=>$row->designationbien,'dateacquisition'=>$row->dateacquisition, 'actifbrut'=> $resultat[$long][1],
                				'dureevie'=>$row->dureevie , 'dotation'=>$resultat[$long][2], 'amortpratiquee'=>$resultat[$long][3], 'valeurnet'=>$resultat[$long][4]];
                				$i++;
                			}
                		}
                	}
                
                	$dataProviderRes = new ArrayDataProvider([
                			'allModels' => $data,
                			'sort' => [
                			'attributes' => ['comptecomptable', 'codebien', 'designationbien', 'dateacquisition', 'actifbrut', 'dureevie', 'dotation', 'amortpratiquee', 'valeurnet'],
                			],
                			]);
                	 
                	$dataProvider=$dataProviderRes;
                	return $this->render ('etatImmoParBien',
                			[
                			'searchModel' => $searchModel,
                			'dataProvider' => $dataProviderRes,
                			'model' => $model,
                			]
                	);
                }
                
                
                

}



