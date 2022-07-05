<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dailydemandcurve".
 *
 * @property int $DemandCurveID
 * @property string $Date
 * @property int $UserID
 * @property int $Status
 * @property string $DateCreated
 */
class Dailydemandcurve extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dailydemandcurve';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DemandCurveID', 'Date', 'UserID'], 'required'],
            [['DemandCurveID', 'UserID', 'Status'], 'integer'],
            [['Date'], 'safe'],
            [['DateCreated'], 'string', 'max' => 45],
            [['DemandCurveID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DemandCurveID' => 'Demand Curve ID',
            'Date' => 'Date',
            'UserID' => 'User ID',
            'Status' => 'Status',
            'DateCreated' => 'Date Created',
        ];
    }

    public function getDailydemandline()
    {
        return $this->hasMany(Dailydemandline::className(), ['DemandCurveID' => 'DemandCurveID']);	
    }
}
