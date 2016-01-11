<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bureau".
 *
 * @property string $codebureau
 * @property string $codestructure
 * @property string $designationbureau
 */
class Bureau extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bureau';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebureau', 'codestructure'], 'required'],
            [['codebureau'], 'string', 'max' => 10],
            [['codestructure'], 'string', 'max' => 11],
            
            [['designationbureau'], 'string', 'max' => 255],
            [['codebureau'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codebureau' => 'Code bureau',
            'codestructure' => 'Code structure',
            'designationbureau' => 'Designation bureau',
        ];
    }
}
