<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "years".
 *
 * @property int|null $HeaderID
 * @property int|null $Year
 */
class Years extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'years';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HeaderID', 'Year'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'HeaderID' => 'Header ID',
            'Year' => 'Year',
        ];
    }
    public function getData() 
	{
        return $this->hasMany(Data::className(), ['HeaderID' => 'HeaderID']);		
    }
}
