<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "intervenant".
 *
 * @property integer $idintervenant
 * @property string $typeinter
 * @property string $titre
 * @property string $adresse
 * @property string $mail
 * @property string $tel
 */
class Intervenant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'intervenant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idintervenant'], 'integer'],
            [['typeinter', 'titre'], 'required'],
            [['typeinter', 'tel'], 'string', 'max' => 128],
            [['titre'], 'string', 'max' => 20],
            [['adresse', 'mail'], 'string', 'max' => 255],
            [['titre'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idintervenant' => 'Idintervenant',
            'typeinter' => 'Typeinter',
            'titre' => 'Titre',
            'adresse' => 'Adresse',
            'mail' => 'Mail',
            'tel' => 'Tel',
        ];
    }
}
