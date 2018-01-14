<!DOCTYPE html>
<html lang="en">

<?php 
include('config.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=" GEOLABS by teerayoot injun as AEGIST">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.egov.go.th/upload/eservice-thumbnail/img_8c680d72898d7ec72e34c1385a815925.png">
    <title>O M F S</title>
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
	
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" id="theme" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" id="theme" rel="stylesheet">
	
	
    <!-- GEOLABS GEOLABS GEOLABS GEOLABS GEOLABS GEOLABS GEOLABS GEOLABS GEOLABS GEOLABS-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
td,
th {
  padding: 0;
  font-size: 12px;
}
</style>
<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="./"> 
                       <img src="../img/logo_1.png" alt="home" width="70%" />

                      </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>


                    </li>
                    <li>
                        <a class="profile-pic" href="profile.php"> <img src="../img/pic_user/<?php echo $objResult[pic_user] ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $objResult[name_user],' ',$objResult[lname_user] ?></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>



        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="./" class="waves-effect"><i class="fa fa-home  fa-fw" aria-hidden="true"></i>หน้าหลัก</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>ระบบภูมิสารสนเทศ</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-tree fa-fw" aria-hidden="true"></i>ข้อมูลพื้นที่ป่า</a>
                    </li>
					<li>
                        <a href="#" class="waves-effect"><i class="fa fa-mobile fa-fw" aria-hidden="true"></i>ระบบ Mobile Field Survey</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-download fa-fw" aria-hidden="true"></i>ดาวน์โหลดข้อมูล</a>
                    </li>
                    <li>
                        <a href="../" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>ออกจากระบบ</a>
                    </li>

                </ul>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

<?php 
    $sql_reg = pg_query("SELECT count(*) FROM user_profile where status_user = 'register_web' or status_user = 'register_app' ;"); 
    $arr3 = pg_fetch_array($sql_reg);
?>

        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h3 class="page-title"> <a href="request.php"><?php echo $arr3[count]; ?> คำร้องขอสมาชิก</a>  </h3> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#"></a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">กราฟแสดงพื้นที่ป่ากับพื้นที่ทั้งหมด รายจังหวัด <br></h3>
                           
  <div id="container" style="min-width: 350px; height: 400px; margin: 0 auto"></div>


                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">จำนวนพื้นที่ป่าแต่ละประเภท</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>จังหวัด</th>
                                            <th>พื้นที่ทั้งหมด / ไร่</th>
                                            <th>พื้นที่ป่าสงวนแห่งชาติ / ไร่</th>
                                            <th>พื้นที่อุทยานแห่งชาติ / ไร่</th>
                                            <th>พื้นที่วนอุทยาน / ไร่</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result2 = pg_query("select a.prov_namt, sum(a.area/1600) as area_nrf , sum(b.area/1600) as area_all , sum(c.area/1600)  as area_nprk , sum(d.area/1600) as area_fprk
from c29_nrf a 
full join c02_province b on a.prov_code = b.prov_code 
full join c30_nprk c on b.prov_code = c.prov_code
full join c31_fprk d on b.prov_code = d.prov_code
where a.prov_namt is not null 
group by a.prov_namt 
order by a.prov_namt asc
");
while ($arr2 = pg_fetch_array($result2)) { 
?>
                                        <tr>
                                            <td><?php echo $arr2[prov_namt]; ?></td>
                                            <td><?php echo number_format($arr2[area_all], 2); ?></td>
                                            <td><?php echo number_format($arr2[area_nrf], 2); ?></td>
                                            <td><?php echo number_format($arr2[area_nprk], 2); ?></td>
                                            <td><?php echo number_format($arr2[area_fprk], 2); ?></td>
                                        </tr>
<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                        <div class="white-box">
                            <h3 class="box-title">กราฟแสดงการเข้าใช้งานระบบ <br></h3>
                           
							<div id="container1" style="min-width: 310px; height: 450px; margin: 0 auto"></div>


                        </div>
                    </div>
					<div  class="col-md-4 col-lg-4 col-sm-4">
                        <div class="white-box">
                            <h3 class="box-title">ตารางแสดงการผู้เข้าใช้งานระบบ</h3>
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
											<th>เวลา</th>
											<th>วันที่</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										$date =  date("Y-m-d") ;
										$result4 = pg_query("select no_stat, name_stat, lname_stat, date_acces::timestamp::date as date_ , date_acces::timestamp::time as time_ 
										from count_stat
										 where date_acces::timestamp::date = '$date'; ");
										while ($arr22 = pg_fetch_array($result4)) { 
										?>
                                        <tr>
											<td><?php echo $arr22[time_]; ?></td>
											<td><?php echo $arr22[date_]; ?></td>
                                            <td><?php echo $arr22[name_stat],' ' , $arr22[lname_stat]; ?></td>
                                            

                                        </tr>
<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
              
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> O-M-F-S Project v2.0. 2018 © All rights reserved. </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>


<script>
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    credits: {
          enabled: false
        },
    xAxis: {
        categories: [
<?php 
$result1 = pg_query("select a.prov_namt, sum(a.area/1600) as area_forest , sum(b.area/1600) as area      
from c66_forest_all a inner join c02_province b on a.prov_code = b.prov_code 
group by a.prov_namt order by prov_namt asc");
while ($arr1 = pg_fetch_array($result1)) { 
?>
            '<?php echo $arr1[prov_namt];  ?>',
<?php } ?>

        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนเนื้อที่ / ไร่'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} ไร่</b></td></tr>',
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
    series: [

    {
        name: 'พื้นที่ป่า',
        data: [
<?php 
$result1 = pg_query("select a.prov_namt, sum(a.area/1600) as area_forest , sum(b.area/1600) as area      
from c66_forest_all a inner join c02_province b on a.prov_code = b.prov_code 
group by a.prov_namt order by prov_namt asc");
while ($arr1 = pg_fetch_array($result1)) { 
?>
        <?php echo $arr1[area_forest];  ?>, 
<?php } ?>
        ]

    }, {
        name: 'พื้นที่ทั้งหมด',
        data: [
        <?php 
$result1 = pg_query("select a.prov_namt, sum(a.area/1600) as area_forest , sum(b.area/1600) as area      
from c66_forest_all a inner join c02_province b on a.prov_code = b.prov_code 
group by a.prov_namt order by prov_namt asc");
while ($arr1 = pg_fetch_array($result1)) { 
?>
        <?php echo $arr1[area];  ?>, 
<?php } ?>
        ]

    }




    ]
});

Highcharts.chart('container1', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    credits: {
          enabled: false
        },
    xAxis: {
        categories: [
<?php 
$result2 = pg_query("select count(no_stat) as stat_ , date_acces::timestamp::date as date_ from count_stat
group by date_
order by date_ desc limit 30 ");
while ($arr12 = pg_fetch_array($result2)) { 
?>
            '<?php echo $arr12[date_];  ?>',
<?php } ?>

        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนผู้เข้าใช้งานระบบ / ครั้ง'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} ครั้ง</b></td></tr>',
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
    series: [

    {
        name: 'วันที่เข้าใช้งานระบบ',
        data: [
<?php 
$result12 = pg_query("select count(no_stat) as stat_ , date_acces::timestamp::date as date_ from count_stat
group by date_
order by date_ desc limit 30 ");
while ($arr12 = pg_fetch_array($result12)) { 
?>
        <?php echo $arr12[stat_];  ?>, 
<?php } ?>
        ]

    }

    ]
});
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>







</body>

</html>
