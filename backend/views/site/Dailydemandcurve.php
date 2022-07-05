<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Rooms */
/* @var $form yii\widgets\ActiveForm */
?>


<html>
<head>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/series-label.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script src="http://code.highcharts.com/modules/export-data.js"></script>
    <script src="http://code.highcharts.com/modules/accessibility.js"></script>


    <div id="demandchat" style="width:100%; height:600px;"></div>
    
    <script>
    $( document ).ready(function() {
        console.log( "document loaded" );
        var data = JSON.parse('<?=json_encode($data)?>')
        var years = JSON.parse('<?=json_encode($Categories)?>')

        Highcharts.chart('demandchat', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Historic and Estimated Worldwide Population Growth by Region'
        },
        subtitle: {
            text: 'Source: Wikipedia.org'
        },
        xAxis: {
            categories: years,
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Billions'
            },
            labels: {
                formatter: function () {
                    return this.value / 1000;
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ' millions'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: data,
    });
});

        
</script>
</head>
</html>
    


