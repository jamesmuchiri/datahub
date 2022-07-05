<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

use backend\models\Years;
use backend\models\Data;
use backend\models\Marketshare;
use backend\models\Marketsharecompanies;
use backend\models\Dailydemandcurve;
use backend\models\Dailydemandline;
use backend\models\Murbancrudeprices;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionData(){

        $PetroleumConsumption = Years::find()->all();
        $YearCategories = array();
        $Data=array();
        $AvRetailTariff= array();
    
        foreach($PetroleumConsumption as $header){
            $YearCategories[] = $header->Year;
            foreach($header->data as $lines)
            {
               // $data['TariffCatagoryID'][] = $lines->AvRetailTariff ? floatval($lines->AvRetailTariff) : NULL; 
                $AvRetailTariff[$lines->tariffCategory->TariffCatagory][] = $lines->AvRetailTariff ? floatval($lines->AvRetailTariff) : NULL;
            }   
            
        }  
        //print_r($AvRetailTariff); exit;
        foreach($AvRetailTariff as $key=>$value){
            $Data[] = array('name'=>$key,'data'=>$value);   
        } 

        //print_r($Data); exit; 

        return $this->render('chat',[
            'Categories' => $YearCategories,
            'data' => $Data,
        ]);   
       
    }
    public function actionMarket(){

        $Marketsharecompanies = Marketsharecompanies::find()->where(['Active'=>1])->all();
        $Companies = array();
        $Data=array();
        $MarketShare= array();
    
        foreach($Marketsharecompanies as $header){
            $Companies[] = $header->CompanyName;
            foreach($header->marketshare as $lines){
                $MarketShare[$lines->Year][] = $lines->MarketShare ? floatval($lines->MarketShare): NULL;

            }
            
        }  
        //print_r($MarketShare); exit;
        
        foreach($MarketShare as $key=>$value){
            $Data[] = array('name'=>$key,'data'=>$value);   
        } 

        //print_r($Data); exit; 

        return $this->render('Marketshare',[
            'Categories' => $Companies,
            'data' => $Data,
        ]);   
       
    }

    public function actionDemandCurve(){

        $Dailydemandcurve = Dailydemandcurve::find()->where(['Status'=>1])->all();
        $Date = array();
        $Data=array();
        $power= array();

        foreach($Dailydemandcurve as $header){
            $Date[]=$header->Date;
            foreach($header->dailydemandline as $lines){
                $power[$lines->Time][] = $lines->Power ? floatval($lines->Power): NULL;
            }
        }
        foreach($power as $key=>$value){
            $Data[] = array('name'=>$key,'data'=>$value);   
        } 


        //print_r($Data); exit;

        return $this->render('Dailydemandcurve',[
            'Categories' => $Date,
            'data' => $Data,
        ]); 
        


    }
    public function actionCrude(){

        $Murbancrudeprices = Murbancrudeprices::find()->all();
        $Year = array();
        $Data=array();
        $Price= array();

        foreach($Murbancrudeprices as $header){
            $Year[]=$header->Year;
            foreach($header->murbancrudelines as $lines){
                $Price[$lines->Month][] = $lines->Price ? floatval($lines->Price): NULL;
            }
        }
        foreach($Price as $key=>$value){
            $Data[] = array('name'=>$key,'data'=>$value);   
        } 


        //print_r($Year); exit;

        return $this->render('Crude',[
            'Categories' => $Year,
            'data' => $Data,
        ]); 
        


    }
    /**
     * Logout action.
     *
     * @return Response
     */
    
}
