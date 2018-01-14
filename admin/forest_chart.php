<!DOCTYPE html>
<html lang="en">

<?php 
include('config.php');

$prov_name = $_GET[prov_name];
$amphoe_name = $_GET[amphoe_name];
$tambon_name = $_GET[tambon_name];

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.egov.go.th/upload/eservice-thumbnail/img_8c680d72898d7ec72e34c1385a815925.png">
    <title>ISNRE2</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="fix-header">
<div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<hr><br><br>
<div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<hr><br><br>
<div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<script>
Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'ป่าสงวนแห่งชาติ'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },  
    credits: {
          enabled: false
        },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'พื้นที่ป่า',
        colorByPoint: true,
        data: [ 
        <?php 
                       $result1 = pg_query("Select nrf_namt,sum(area) from c29_nrf 
                        where prov_namt like '%$prov_name' and amp_namt like '%$amphoe_name' and tam_namt like '%$tambon_name'
                        group by nrf_namt order by sum desc limit 15");
                while ($arr1 = pg_fetch_array($result1)) { 
                ?>

        {
            name: '<?php echo $arr1[nrf_namt]; ?>',
            y: <?php echo $arr1[sum]; ?>
        },
<?php } ?>]
    }]
});

</script>

<script>
 Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'อุทยานแห่งชาติ'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },  
    credits: {
          enabled: false
        },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'พื้นที่ป่า',
        colorByPoint: true,
        data: [ 
        <?php 
                       $result2 = pg_query("Select nprk_namt,sum(area) from c30_nprk 
                        where prov_namt like '%$prov_name' and amp_namt like '%$amphoe_name' and tam_namt like '%$tambon_name' group by nprk_namt order by sum desc limit 15");
                while ($arr2 = pg_fetch_array($result2)) { 
                ?>

        {
            name: '<?php echo $arr2[nprk_namt]; ?>',
            y: <?php echo $arr2[sum]; ?>
        },
<?php } ?>]
    }]
});
</script>

<script>
  Highcharts.chart('container3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'วนอุทยาน'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },  
    credits: {
          enabled: false
        },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'พื้นที่ป่า',
        colorByPoint: true,
        data: [ 
        <?php 
        $result3 = pg_query("Select fprk_namt,sum(area) from c31_fprk 
                        where prov_namt like '%$prov_name' and amp_namt like '%$amphoe_name' and tam_namt like '%$tambon_name' 
                        group by fprk_namt order by sum desc limit 15");
                while ($arr3 = pg_fetch_array($result3)) { 
                ?>

        {
            name: '<?php echo $arr3[fprk_namt]; ?>',
            y: <?php echo $arr3[sum]; ?>
        },
<?php } ?>]
    }]
});
</script>
</body>

</html>
