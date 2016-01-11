<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materielinformatique".
 *
 * @property string $codebien
 * @property string $modele
 * @property string $ram
 * @property string $disquedur
 * @property string $os
 * @property string $cartegraph
 * @property string $processur
 * @property string $camera
 * @property string $numserie
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
class Materielinformatique extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materielinformatique';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien',  'designationbien', 'statutbien', 'etatbien'], 'required'],
            [['codebien', 'prixachat', 'tauxamort', 'poids','seq'], 'number'],
            [['dureevie'], 'integer'],
            [['ram', 'modele','disquedur', 'os', 'cartegraph', 'processur', 'camera', 'numserie', 'statutbien', 'etatbien'], 'string', 'max' => 128],
            [[ 'typeamort'], 'string', 'max' => 32],
            [['typebien','designationbien', 'commentaire'], 'string', 'max' => 255],
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
            'ram' => 'Ram',
            'disquedur' => 'Disquedur',
            'os' => 'Os',
            'cartegraph' => 'Cartegraph',
            'processur' => 'Processur',
            'camera' => 'Camera',
            'numserie' => 'Numserie',
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
