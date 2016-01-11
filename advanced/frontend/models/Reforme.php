<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "reforme".
 *
 * @property integer $datereforme
 * @property string $refpvreforme
 * @property string $numdecisionreforme
 * @property string $conclusionreforme
 */
class Reforme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reforme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datereforme'], 'required'],
            [['datereforme'], 'string', 'max' => 10],
            [['refpvreforme'], 'string', 'max' => 128],
            [['numdecisionreforme'], 'string', 'max' => 32],
            [['conclusionreforme'], 'string', 'max' => 255],
            [['datereforme'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    
    public function attributeLabels()
    {
        return [
            'datereforme' => 'Datereforme',
            'refpvreforme' => 'Refpvreforme',
            'numdecisionreforme' => 'Numdecisionreforme',
            'conclusionreforme' => 'Conclusionreforme',
        ];
    }
}
