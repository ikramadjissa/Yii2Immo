<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modele".
 *
 * @property string $modele
 * @property string $marque
 */
class Modele extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modele';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modele'], 'required'],
            [['modele', 'marque','typebien'], 'string', 'max' => 128],
            [['modele'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'modele' => 'Modele',
            'marque' => 'Marque',
        ];
    }
}
