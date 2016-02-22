<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $updated_on
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['updated_on'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'updated_on' => 'Updated On',
        ];
    }
    
    public static function  default_language()
    {
    	return  Setting::find()->where(['name' => 'default_language'])->one()->value;
    }
    
    public static function  default_notification_option()
    {
    	return  Setting::find()->where(['name' => 'default_notification_option'])->one()->value;
    }
    
    public static function  password_min_length()
    {
    	return Setting::find()->where(['name' => 'password_min_length'])->one()->value;
    }
}
