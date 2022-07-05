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


    <div id="Marketchat" style="width:100%; height:600px;"></div>
    
    <script>
    $( document ).ready(function() {
        console.log( "document loaded" );
        var data = JSON.parse('<?=json_encode($data)?>')
        var years = JSON.parse('<?=json_encode($Categories)?>')

        Highcharts.chart('Marketchat', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Price'
        },
        subtitle: {
           // text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories:years,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'MarketShare'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: data,
    });
});

        
</script>
</head>
</html>
    


