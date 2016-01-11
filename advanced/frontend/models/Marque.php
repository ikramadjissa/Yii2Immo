<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marque".
 *
 * @property string $marque
 */
class Marque extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marque';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marque'], 'required'],
            [['marque'], 'string', 'max' => 128],
            [['marque'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'marque' => 'Marque',
        ];
    }
}
