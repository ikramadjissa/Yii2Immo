<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "famille".
 *
 * @property integer $codefamille
 * @property string $designationfamille
 * @property integer $codecomptecomptable
 */
class Famille extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'famille';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codefamille', 'codecomptecomptable'], 'required'],
            [['codefamille', 'codecomptecomptable'], 'integer'],
            [['designationfamille'], 'string', 'max' => 255],
            [['codefamille'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codefamille' => 'Codefamille',
            'designationfamille' => 'Designationfamille',
            'codecomptecomptable' => 'Codecomptecomptable',
        ];
    }
}
