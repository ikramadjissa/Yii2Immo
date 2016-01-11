<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transport".
 *
 * @property string $codebien
 * @property integer $matricule
 * @property integer $annee_fab
 * @property integer $numchassie
 * @property integer $energie
 * @property integer $puisscv
 * @property integer $charge
 * @property integer $nb_place
 * @property string $modele
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
 * @property string $datefingarantie
 * @property string $datedebugarantie
 */
class Transport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien'], 'required'],
            [['codebien', 'prixachat', 'tauxamort', 'poids'], 'number'],
            [['dureevie'], 'integer'],
            [['matricule', 'annee_fab', 'numchassie', 'energie', 'puisscv', 'charge', 'nb_place'], 'string'],
            [[ 'designationbien','typebien', 'commentaire'], 'string', 'max' => 255],
            [[ 'typeamort'], 'string', 'max' => 32],
            [['dateacquisition', 'datefingarantie', 'datedebugarantie'], 'string', 'max' => 10],
            [['statutbien', 'etatbien','modele'], 'string', 'max' => 128],
            [['codebien'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codebien' => 'Codebien',
            'matricule' => 'Matricule',
            'annee_fab' => 'Annee Fab',
            'numchassie' => 'Numchassie',
            'energie' => 'Energie',
            'puisscv' => 'Puisscv',
            'charge' => 'Charge',
            'nb_place' => 'Nb Place',
            'carac_tech' => 'Carac Tech',
            'typebien' => 'Typebien',
            'designationbien' => 'Designationbien',
            'dateacquisition' => 'Dateacquisition',
            'statutbien' => 'Statutbien',
            'etatbien' => 'Etatbien',
            'prixachat' => 'Prixachat',
            'tauxamort' => 'Tauxamort',
            'typeamort' => 'Typeamort',
            'dureevie' => 'Dureevie',
            'commentaire' => 'Commentaire',
            'poids' => 'Poids',
            'datefingarantie' => 'Datefingarantie',
            'datedebugarantie' => 'Datedebugarantie',
        ];
    }
}
