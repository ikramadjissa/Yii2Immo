<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materielbureautique".
 *
 * @property string $codebien
 * @property string $dimenssion
 * @property string $couleur
 * @property string $matiere_fabrication
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
class Materielbureautique extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materielbureautique';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien',  'designationbien', 'dateacquisition', 'statutbien', 'etatbien', 'prixachat'], 'required'],
            [['codebien', 'prixachat', 'tauxamort', 'poids'], 'number'],
            [['dureevie'], 'integer'],
            [['typebien','dimenssion', 'designationbien', 'commentaire'], 'string', 'max' => 255],
            [[ 'couleur', 'matiere_fabrication', 'statutbien', 'etatbien'], 'string', 'max' => 128],
            [[ 'typeamort'], 'string', 'max' => 32],
            [['dateacquisition', 'datedebugarantie','datefingarantie'], 'string', 'max' => 10],
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
            'dimenssion' => 'Dimenssion',
            'couleur' => 'Couleur',
            'matiere_fabrication' => 'Matiere Fabrication',
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
