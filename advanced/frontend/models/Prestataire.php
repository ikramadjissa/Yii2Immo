<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestataire".
 *
 * @property string $num_reg
 * @property string $designation
 * @property string $adresse
 * @property string $tel
 * @property string $fax
 * @property string $email
 * @property string $natureprestation
 */
class Prestataire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestataire';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_reg'], 'required'],
            [['num_reg', 'designation', 'tel', 'fax'], 'string', 'max' => 32],
            [['adresse'], 'string', 'max' => 128],
            [['email'], 'email'],
            [['natureprestation'], 'string', 'max' => 255],
            [['num_reg'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'num_reg' => 'Code préstataire:',
            'designation' => 'Nom préstataire:',
            'natureprestation' => 'Profession:',
            'adresse' => 'Adresse:',
            'tel' => 'Téléphone:',
            'fax' => 'Fax:',
            'email' => 'Email:',
          
        ];
    }
}
