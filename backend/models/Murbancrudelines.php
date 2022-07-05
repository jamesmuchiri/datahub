<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "murbancrudelines".
 *
 * @property int $MurbanCrudeLineID
 * @property int $MurbanCrudePriceID
 * @property int $Month
 * @property float|null $Price
 */
class Murbancrudelines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'murbancrudelines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MurbanCrudePriceID', 'Month'], 'required'],
            [['MurbanCrudePriceID', 'Month'], 'integer'],
            [['Price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MurbanCrudeLineID' => 'Murban Crude Line ID',
            'MurbanCrudePriceID' => 'Murban Crude Price ID',
            'Month' => 'Month',
            'Price' => 'Price',
        ];
    }
    
}
