<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "immobilier".
 *
 * @property string $codebien
 * @property string $superfice
 * @property string $adresse
 * @property integer $nbretage
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
 * @property string $garantie
 * @property string $datedebugarantie
 */
class Immobilier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'immobilier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien', 'superfice', 'adresse', 'designationbien', 'dateacquisition', 'statutbien', 'etatbien', 'prixachat'], 'required'],
            [['codebien', 'prixachat', 'tauxamort', 'poids', 'garantie'], 'number'],
            [['nbretage', 'dureevie'], 'integer'],
            [['superfice', 'statutbien', 'etatbien'], 'string', 'max' => 128],
            [['adresse', 'designationbien','typebien', 'commentaire'], 'string', 'max' => 255],
            [[ 'typeamort'], 'string', 'max' => 32],
            [['dateacquisition', 'datedebugarantie'], 'string', 'max' => 10],
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
            'superfice' => 'Superfice',
            'adresse' => 'Adresse',
            'nbretage' => 'Nbretage',
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
            'garantie' => 'Garantie',
            'datedebugarantie' => 'Datedebugarantie',
        ];
    }
}
