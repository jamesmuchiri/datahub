<?php

namespace backend\controllers;

class ChatController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionData(){

        $PetroleumConsumption = Years::find()->all();
        $YearCategories = array();
    
        foreach($PetroleumConsumption as $header){
            $YearCategories[] = $header->Year;
            
        }   
        print_r($YearCategories); exit;
       
    }

}
