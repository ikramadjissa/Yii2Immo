<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bien".
 *
 * @property string $codebien
 * @property integer $codesousfamille
 * @property integer $numfacture
 * @property integer $numcmd
 * @property string $typebien
 * @property string $designationbien
 * @property string $dateacquisition
 * @property string $statutbien
 * @property string $etatbien
 * @property string $prixachat
 * @property string $tauxamort
 * @property string $typeamort
 * @property integer $dureevie
 * @property string $commentaire
 * @property string $poids


 * @property string $datedebugarantie
 * @property string $datefingarantie
 * * @property string $modele
 */
class Bien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	

	
	
	public $file;
	
	public function attributes()
	{
	
		return array_merge( parent::attributes() , ['date mouvement','mouvement','affecté vers',
             'transféré de',
             'transféré vers',
		      'date fin reparation',
				'type reforme',
				/*                   attribut sim                       */
				'typereforme','anneeRef','dateRef','actifbrut', 'amortpratiquee','valeurnet', 'anneexercice', 'dotation', 'comptecomptable', 'datetrensfert', 'prixcession','unite', 'structure','compte comptable',
				'designation compte',
				'valeur brute',
				'année exercice',
				'dotation',
				'amortissements cumulés',
				'valeur nette','état','désignation',
			'date enregistrement',
				
				]);
	}
	
    public static function tableName()
    {
        return 'bien';
    }

    /**
     * @inheritdoc
     */
    
  
    
    public function rules()
    {
        return [
            [['codebien',   'designationbien', 'dateacquisition'], 'required'],
            [['codebien','numfacture','numcmd','prixachat', 'tauxamort', 'poids',  'amortpratiquee','valeurnet', 'dotation', 'prixcession'], 'number'],
            [[ 'dureevie','anneexercice', 'comptecomptable','seq'], 'integer'],
            [['file'], 'file'],
            [['path','valeur brute'], 'string'],
            [[  'typeamort','typereforme'], 'string', 'max' => 32],
            [['designationbien', 'commentaire','typebien','unite','codesousfamille','structure'], 'string', 'max' => 255],
            [['dateacquisition', 'datedebugarantie','datefingarantie', 
            'dateenr','date mouvement', 'affecté vers', 'transféré de','transféré vers',
		      'date fin reparation','dateRef','anneeRef','datetrensfert'], 'string', 'max' => 10],
            [['statutbien', 'modele','etatbien','mouvement','type reforme'], 'string', 'max' => 128],
            [['codebien'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codebien' => 'Code bien',
            'codesousfamille' => 'Sous Famille',
            'typebien' => 'Type bien',
            'designationbien' => 'Designation',
            'dateacquisition' => 'Date dacquisition',
            'statutbien' => 'Status',
            'etatbien' => 'Etat',
            'prixachat' => 'Prix d achat',
            'tauxamort' => "Taux d'amortissement (%)",
            'typeamort' => 'Typeamort',
            'dureevie' => 'Dureevie',
            'commentaire' => 'Commentaire',
            'poids' => 'Poids',
            'datefingarantie' => 'Date fin garantie',
            'datedebugarantie' => 'Datedebugarantie',
            'numfacture' => 'Numéro facture',
            'numcmd' => 'Numéro de commande',
            'dt' =>'Date mise en instance',
            'modele' => 'Modèle :',
             'dateenr'=>'Date proposition à la réforme',
            'date mouvement'=>'Date mouvement',
            'mouvement'=>'Mouvement',
            'affecté vers'=>'Affecté vers',
            'transféré de'=>'Transféré de',
            'transféré vers'=>'Transféré vers',
            'date fin reparation'=>'Date fin réparation',
            'type reforme'=>'Type de réforme',
            
            
            'typereforme' => 'Type de reforme',
            'anneeRef' => 'Annee de Reforme',
            'actifbrut'=> 'Actif',
            'amortpratiquee'=> 'Amortissement pratiquee',
            'valeurnet' => 'Valeur nette',
            'anneexercice' => 'Annee exercice',
            'dotation' => 'Dotation',
            'comptecomptable' => 'Compte comptable',
            'dateRef' => 'Date reforme',
            'datetrensfert'=> 'Annee exercice',
            'prixcession'=>  'Prix Cession',
            'file' => 'PV de réparation',
            'unite'=> 'Unite',
            'structure'=> 'Structure',
        ];
    }
    
    
}
