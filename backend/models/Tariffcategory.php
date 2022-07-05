<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tariffcategory".
 *
 * @property int|null $TariffCatagoryID
 * @property string|null $TariffCatagory
 */
class Tariffcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariffcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TariffCatagoryID'], 'integer'],
            [['TariffCatagory'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TariffCatagoryID' => 'Tariff Catagory ID',
            'TariffCatagory' => 'Tariff Catagory',
        ];
    }
}
