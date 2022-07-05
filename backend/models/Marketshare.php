<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "marketshare".
 *
 * @property int $MarketShareID
 * @property int $MarketShareCompanyID
 * @property string $Year
 * @property float|null $MarketShare
 * @property int|null $UserID
 * @property string|null $DateCreated
 * @property int|null $Active
 */
class Marketshare extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketshare';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MarketShareCompanyID', 'Year'], 'required'],
            [['MarketShareCompanyID', 'UserID', 'Active'], 'integer'],
            [['MarketShare'], 'number'],
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
            'MarketShareID' => 'Market Share ID',
            'MarketShareCompanyID' => 'Market Share Company ID',
            'Year' => 'Year',
            'MarketShare' => 'Market Share',
            'UserID' => 'User ID',
            'DateCreated' => 'Date Created',
            'Active' => 'Active',
        ];
    }
}
