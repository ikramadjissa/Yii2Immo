<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ville".
 *
 * @property string $nom
 * @property string $adresse
 */
class Ville extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ville';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom'], 'required'],
            [['nom', 'adresse'], 'string', 'max' => 128],
            [['nom'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nom' => 'Nom',
            'adresse' => 'Adresse',
        ];
    }
}
