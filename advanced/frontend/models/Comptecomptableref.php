<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comptecomptableref".
 *
 * @property integer $codecompteref
 * @property string $designation
 */
class Comptecomptableref extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comptecomptableref';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecompteref'], 'required'],
            [['codecompteref'], 'integer'],
            [['designation'], 'string', 'max' => 128],
            [['codecompteref'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codecompteref' => 'Codecompteref',
            'designation' => 'Designation',
        ];
    }
}
