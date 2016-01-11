<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat".
 *
 * @property string $dt
 */
class Dat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	
	
	public function attributes()
	{
	
		return array_merge( parent::attributes() , ['datefin',
				
	
				]);
	}
	
	
	
    public static function tableName()
    {
        return 'dat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt'], 'required'],
            [['dt','datefin'], 'string', 'max' => 10],
            [['dt'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dt' => 'Date :',
        ];
    }
}
