<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materielchaudfroid".
 *
 * @property string $codebien
 * @property string $ref
 * @property string $cptchaud
 * @property string $cptfroid
 * @property string $d�bitair
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
class Materielchaudfroid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materielchaudfroid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien',  'designationbien', 'dateacquisition', 'statutbien', 'etatbien', 'prixachat'], 'required'],
            [['codebien', 'cptchaud', 'cptfroid', 'debitair', 'prixachat', 'tauxamort', 'poids'], 'number'],
            [['dureevie'], 'integer'],
            [['ref', 'statutbien', 'etatbien'], 'string', 'max' => 128],
            [[ 'typeamort'], 'string', 'max' => 32],
            [['designationbien','typebien', 'commentaire'], 'string', 'max' => 255],
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
            'ref' => 'Ref',
            'cptchaud' => 'Cptchaud',
            'cptfroid' => 'Cptfroid',
            'd�bitair' => 'D�bitair',
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
