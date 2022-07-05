<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int|null $LineID
 * @property int|null $HeaderID
 * @property int|null $TariffCatagoryID
 * @property float|null $AvRetailTariff
 * @property string|null $E
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LineID', 'HeaderID', 'TariffCatagoryID'], 'integer'],
            [['AvRetailTariff'], 'number'],
            [['E'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'LineID' => 'Line ID',
            'HeaderID' => 'Header ID',
            'TariffCatagoryID' => 'Tariff Catagory ID',
            'AvRetailTariff' => 'Av Retail Tariff',
            'E' => 'E',
        ];
    }
    public function getTariffCategory() 
	{
        return $this->hasOne(Tariffcategory::className(), ['TariffCatagoryID' => 'TariffCatagoryID']);		
    }
}
