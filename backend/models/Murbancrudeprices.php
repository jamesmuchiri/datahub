<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "murbancrudeprices".
 *
 * @property int $MurbanCrudePriceID
 * @property string $Year
 * @property int|null $UserID
 * @property string|null $DateCreated
 */
class Murbancrudeprices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'murbancrudeprices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Year'], 'required'],
            [['UserID'], 'integer'],
            [['DateCreated'], 'safe'],
            [['Year'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MurbanCrudePriceID' => 'Murban Crude Price ID',
            'Year' => 'Year',
            'UserID' => 'User ID',
            'DateCreated' => 'Date Created',
        ];
    }
    public function getMurbancrudelines()
    {
        return $this->hasMany(Murbancrudelines::className(), ['MurbanCrudePriceID' => 'MurbanCrudePriceID']);	
    }
}
