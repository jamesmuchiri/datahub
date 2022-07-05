<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "marketsharecompanies".
 *
 * @property int $MarketShareCompanyID
 * @property string $CompanyName
 * @property int|null $Active
 */
class Marketsharecompanies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketsharecompanies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CompanyName'], 'required'],
            [['Active'], 'integer'],
            [['CompanyName'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MarketShareCompanyID' => 'Market Share Company ID',
            'CompanyName' => 'Company Name',
            'Active' => 'Active',
        ];
    }
    public function getMarketshare() 
	{
        return $this->hasMany(Marketshare::className(), ['MarketShareCompanyID' => 'MarketShareCompanyID']);		
    }
}
