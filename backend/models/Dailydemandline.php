<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dailydemandline".
 *
 * @property int $DailyDemandLineID
 * @property string $Time
 * @property float $Power(MW)
 * @property int $DemandCurveID
 */
class Dailydemandline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dailydemandline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DailyDemandLineID', 'Time', 'Power', 'DemandCurveID'], 'required'],
            [['DailyDemandLineID', 'DemandCurveID'], 'integer'],
            [['Time'], 'safe'],
            [['Power'], 'number'],
            [['DailyDemandLineID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DailyDemandLineID' => 'Daily Demand Line ID',
            'Time' => 'Time',
            'Power' => 'Power',
            'DemandCurveID' => 'Demand Curve ID',
        ];
    }
}
