<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fournisseur".
 *
 * @property string $regcomm
 * @property string $designation
 * @property string $adressfourn
 * @property string $telfourn
 * @property string $fax
 */
class Fournisseur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fournisseur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regcomm', 'designation'], 'required'],
            [['regcomm'], 'string', 'max' => 128],
            [['designation', 'adressfourn', 'telfourn', 'fax'], 'string', 'max' => 255],
            [['regcomm'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'regcomm' => 'Code fournisseur:',
            'designation' => 'Nom:',
            'adressfourn' => 'Adresse:',
            'telfourn' => 'Tel:',
            'fax' => 'Fax:',
        ];
    }
}
