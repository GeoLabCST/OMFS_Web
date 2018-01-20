<!doctype html>
<html lang="en">
<?php
include('../../libs/config_omfs.php');

session_start();
$strpg = "SELECT * FROM user_profile  WHERE iden_number = '".$_SESSION['iden_number']."'   ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);
    $id = $objResult[id_user];

    $status = $objResult[status_user];


    if($_SESSION['iden_number'] == "")
    {
        header('Location: ../');
        exit();
    }

    else if( $status != "register_web"  && $status != "register_app" && $status != "operational"   )
    {
        header('Location: ../');
        exit();
    }


?>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../img/icon_top.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>O M F S</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-1.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="./" class="simple-text">
                   <img src="../img/logo5.png" alt="" width="100%">
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="./">
                        <i class="pe-7s-home"></i>
                        <p>หน้าหลัก</p>
                    </a>
                </li>
                <li>
                    <a href="p-gis.php">
                        <i class="pe-7s-global"></i>
                        <p>ระบบภูมิสารสนเทศ</p>
                    </a>
                </li>
                <li>
                    <a href="p-fire.php">
                        <i class="pe-7s-speaker"></i>
                        <p>ระบบรายงานจุดความร้อน</p>
                    </a>
                </li>
                <li>
                    <a href="p-survey.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>OMFS Mobile Survey</p>
                    </a>
                </li>
                <li>
                    <a href="p-download.php">
                        <i class="pe-7s-cloud-download"></i>
                        <p>ดาวน์โหลดข้อมูล </p>
                    </a>
                </li>
                <li>
                    <a href="p-user.php">
                        <i class="pe-7s-user"></i>
                        <p>ข้อมูลผู้ใช้งาน </p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../">
                               ออกจากระบบ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">รายงานสถานการณ์จุดเกิดไฟป่า</h4>
                            </div>
                            <div class="content">
<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> อัพเดตล่าสุด 1 วันที่แล้ว
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">
                                <h4 class="title">รายงานสถานการณ์จุดความร้อน</h4>
                            </div>
                            <div class="content">
<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> ข้อมูลล่าสุดปี 2016
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-5">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">รายงานสถานการณ์จุดความร้อน</h4>
                            </div>
                            <div class="content">
<div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> ข้อมูลล่าสุดปี 2016
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">รายงานสถานการณ์จุดเกิดไฟป่าของท่าน</h4>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>วันที่</th>
                                                <th>ชื่อสถานที่</th>
                                                <th>ประเภทจุดเกิดเหตุ</th>
                                                <th>ตำบล</th>
                                                <th>อำเภอ</th>
                                                <th>จังหวัด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
    $sql3 = "SELECT * FROM v_fire_report where id = '$id' order by acq_date desc limit 10  ";
    $query3 = pg_query($db,$sql3);
   while ($arr3 = pg_fetch_array($query3)) {
  ?>      
                                            <tr>
                                                <td><?php echo $arr3[acq_date]; ?></td>
                                                <td><?php echo $arr3[fplace]; ?></td>
                                                <td><?php echo $arr3[ftype]; ?></td>
                                                <td><?php echo $arr3[tb_tn]; ?></td>
                                                <td><?php echo $arr3[ap_tn]; ?></td>
                                                <td><?php echo $arr3[pv_tn]; ?></td>
                                            </tr>
    <?php  } ?>                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> อัพเดตล่าสุด 1 วันที่แล้ว
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                           
                        </li>
                        <li>
                            <a href=""><img src="../img/logo_footer.png" width="80px" alt=""></a>
                            
                        </li>
                       
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;  2018 | สำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัดเชียงราย
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script>
        
Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
   <?php 
    $sql1 = "SELECT pv_tn,count(*) FROM v_fire_report   group by pv_tn  ";
    $query1 = pg_query($db,$sql1);
   while ($arr1 = pg_fetch_array($query1)) {
  ?>      
            '<?php echo $arr1[pv_tn]; ?>',
    <?php  } ?>   
        ],
        crosshair: true
    },
    legend: {
         enabled: false
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนรายงาน'
        }
    },
        credits: {
          enabled: false
        },

       tooltip: {
        headerFormat: '<span style="font-size:10px"> {point.key} </span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0"> {series.name} : </td>' +
            '<td style="padding:0"><b> {point.y} จุด</b></td></tr>',
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
    series: [{
        name: 'จำนวนรายงาน',
        color: '#804000',
        data: [   <?php 
    $sql1 = "SELECT pv_tn,count(*) FROM v_fire_report   group by pv_tn  ";
    $query1 = pg_query($db,$sql1);
   while ($arr1 = pg_fetch_array($query1)) {
  ?>      
            <?php echo $arr1[count]; ?>,
    <?php  } ?>]

    }]
});
    </script>




    <script>
        
Highcharts.chart('container2', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    legend: {
         enabled: false
    },
    xAxis: {
        categories: [
  <?php 
    $sql2 = "SELECT pv_tn,count(*) FROM fire_archive  WHERE acq_date between '2016-01-01'  and '2016-12-31' group by pv_tn  ";
    $query2 = pg_query($db,$sql2);
   while ($arr2 = pg_fetch_array($query2)) {
  ?>      
            '<?php echo $arr2[pv_tn]; ?>',
    <?php  } ?>           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนจุดความร้อน'
        }
    },
        credits: {
          enabled: false
        },
    tooltip: {
        headerFormat: '<span style="font-size:10px"> {point.key} </span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0"> {series.name} : </td>' +
            '<td style="padding:0"><b>{point.y} จุด</b></td></tr>',
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
    series: [{
        name: 'จำนวนจุดความร้อน',
        color: '#b35900',
        data: [  <?php 
    $sql2 = "SELECT pv_tn,count(*) FROM fire_archive  WHERE acq_date between '2016-01-01'  and '2016-12-31' group by pv_tn  ";
    $query2 = pg_query($db,$sql2);
   while ($arr2 = pg_fetch_array($query2)) {
  ?>      
            <?php echo $arr2[count]; ?>,
    <?php  } ?> ]

    }]
});
    </script>


    <script>
        
Highcharts.chart('container3', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    legend: {
         enabled: false
    },
    xAxis: {
        categories: [
  <?php 
    $sql2 = "with ss as (
select extract(year from acq_date) as yr, extract(month from acq_date) as mon , count(*)
from fire_archive
group by extract(year from acq_date), extract(month from acq_date)
)select * ,
CASE
    WHEN mon = 1 THEN 'มกราคม'
    WHEN mon = 2 THEN 'กุมภาพันธ์'
    WHEN mon = 3 THEN 'มีนาคม'
    WHEN mon = 4 THEN 'เมษายน'
    WHEN mon = 5 THEN 'พฤษภาคม'
    WHEN mon = 6 THEN 'มิถุนายน'
    WHEN mon = 7 THEN 'กรกฎาคม'
    WHEN mon = 8 THEN 'สิงหาคม'
    WHEN mon = 9 THEN 'กันยายน'
    WHEN mon = 10 THEN 'ตุลาคม'
    WHEN mon = 11 THEN 'พฤศจิกายน'
    WHEN mon = 12 THEN 'ธันวาคม'
END  as month from ss where yr = 2016 order by mon asc";
    $query2 = pg_query($db,$sql2);
   while ($arr2 = pg_fetch_array($query2)) {
  ?> 
            '<?php echo $arr2[month]; ?>',
    <?php  } ?>           
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนจุดความร้อน'
        }
    },
        credits: {
          enabled: false
        },
    tooltip: {
        headerFormat: '<span style="font-size:10px"> {point.key} </span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0"> {series.name} : </td>' +
            '<td style="padding:0"><b>{point.y} จุด</b></td></tr>',
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
    series: [{
        name: 'จำนวนจุดความร้อน',
        color: '#b35900',
        data: [  <?php 
    $sql2 = "with ss as (
select extract(year from acq_date) as yr, extract(month from acq_date) as mon , count(*)
from fire_archive
group by extract(year from acq_date), extract(month from acq_date)
)select * ,
CASE
    WHEN mon = 1 THEN 'มกราคม'
    WHEN mon = 2 THEN 'กุมภาพันธ์'
    WHEN mon = 3 THEN 'มีนาคม'
    WHEN mon = 4 THEN 'เมษายน'
    WHEN mon = 5 THEN 'พฤษภาคม'
    WHEN mon = 6 THEN 'มิถุนายน'
    WHEN mon = 7 THEN 'กรกฎาคม'
    WHEN mon = 8 THEN 'สิงหาคม'
    WHEN mon = 9 THEN 'กันยายน'
    WHEN mon = 10 THEN 'ตุลาคม'
    WHEN mon = 11 THEN 'พฤศจิกายน'
    WHEN mon = 12 THEN 'ธันวาคม'
END from ss where yr = 2016 order by mon asc";
    $query2 = pg_query($db,$sql2);
   while ($arr2 = pg_fetch_array($query2)) {
  ?>      
            <?php echo $arr2[count]; ?>,
    <?php  } ?> ]

    }]
});
    </script>


</html>
