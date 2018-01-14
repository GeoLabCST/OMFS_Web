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
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/icon_top.png">
    <title>OMFS</title>
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
                        <a href="survey.php" class="waves-effect"><i class="fa fa-mobile fa-fw" aria-hidden="true"></i>ระบบ Mobile Field Survey</a>
                    </li>
                    <li>
                        <a href="download.php" class="waves-effect"><i class="fa fa-download fa-fw" aria-hidden="true"></i>ดาวน์โหลดข้อมูล</a>
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
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">ดาวน์โหลดข้อมูล</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="./">หน้าแรก</a></li>
                            <li class="active">ดาวน์โหลดข้อมูล</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  
                     <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>กลุ่มชั้นข้อมูล</th>
                                      <th>ชื่อชั้นข้อมูล</th>
                                      <th>ลักษณะข้อมูล</th>
                                      <th width="10%"><center> ดาวน์โหลด </center></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลขอบเขตการบริหาร</td>
                                      <td>เขตภาค</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c01_region.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตจังหวัด</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c02_province.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตอำเภอ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c03_district.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตตำบล </td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c04_subdistrict.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตเทศบาล</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c05_municipa.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ตำแหน่งหมู่บ้าน</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c06_village.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ที่ตั้งโครงการ (NGO)</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c07_ngo_prj.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่ตั้งโครงการ (EIA)</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c08_eia_prj.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ผังเมือง</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c09_urb_plan.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตควบคุมมลพิษ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c10_pc_zone.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลคุณภาพสิ่งแวดล้อม</td>
                                      <td>จุดตรวจวัดทางอุตุนิยมวิทยา</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c11_weather.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>จุดตรวจวัดเสียง</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c12_noise.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>จุดตรวจวัดคุณภาพอากาศ</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c13_airqlt.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ตำแหน่งสถานีตรวจวัดคุณภาพน้ำ</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c14_waterqlt.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลลักษณะภูมิประเทศ</td>
                                      <td>เส้นชั้นความสูง</td>
                                      <td>Line</td>
                                      <td><center><a href="../datasets/c15_contour.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>DEM</td>
                                      <td>Raster</td>
                                      <td><center><a href="../datasets/c16_dem.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลทรัพยากรน้ำ</td>
                                      <td>ขอบเขตลุ่มน้ำ ๒๕ ลุ่มน้ำหลัก</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c17_basin.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ทางน้ำ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c18_stream.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>แหล่งน้ำธรรมชาติ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c19_natural_wtr_body.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>แหล่งน้ำที่มนุษย์สร้างขึ้น</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c20_reservoir.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td> ตำแหน่งสถานีตรวจวัดระดับน้ำ</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c21_strm_gage.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ชั้นคุณภาพลุ่มน้ำ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c22_wshd_cl.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ประปาหมู่บ้าน, ประปาสัมปทาน </td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c23_vil_wtrsupply.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลทรัพยากรน้ำบาดาลและธรณีวิทยา</td>
                                      <td>อุทกธรณีวิทยา</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c24_hydrogeology.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>บ่อน้ำบาดาล</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c25_well.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ธรณีวิทยา </td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c26_geology.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลทรัพยากรดิน</td>
                                      <td>แผนที่ดิน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c27_soil.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลทรัพยากรป่าไม้ </td>
                                      <td>ขอบเขตชนิดของป่าไม้ </td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c28_foresttype.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ป่าสงวนแห่งชาติ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c29_nrf.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>อุทยานแห่งชาติ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c30_nprk.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>วนอุทยาน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c31_fprk.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตรักษาพันธุ์สัตว์ป่า</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c32_wldsshp.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตห้ามล่าสัตว์ป่า</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c33_nhw.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>การใช้ประโยชน์พื้นที่ปาไม้</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c34_forestzoning.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่ สปก.</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c35_alro.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลการใช้ที่ดิน</td>
                                      <td>ประเภทการใช้ที่ดิน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c36_landuse.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่ศักยภาพในการใช้ที่ดิน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c37_soilsuit.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลสถานที่สำคัญ</td>
                                      <td>แหล่งศิลปกรรม</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c38_heritage.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลโครงสร้างพื้นฐานและสาธารณูปโภค</td>
                                      <td>ถนน</td>
                                      <td>Line</td>
                                      <td><center><a href="../datasets/c39_road.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ทางรถไฟ</td>
                                      <td>Line</td>
                                      <td><center><a href="../datasets/c40_rail.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ท่าเรือ</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c41_harbour.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ท่าอากาศยาน</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c42_airport.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ไฟฟ้า</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c43_electr.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ประปา</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c44_watersupply.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>โทรศัพท์</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c45_telephone.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ที่ตั้งโรงงานอุตสาหกรรม</td>
                                      <td>Point </td>
                                      <td><center><a href="../datasets/c46_factory.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>โรงพยาบาล</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c47_hospital.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>โรงเรียน</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c48_school.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ศาสนสถาน</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c49_religious.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>สถานีตำรวจ</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c50_policestation.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>สถานีบริการเชื้อเพลิง</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c51_gasoline.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ไปรษณีย์ </td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c52_postoffice.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลพื้นที่เสี่ยงภัย</td>
                                      <td>พื้นที่เสี่ยงภัยจากสารอันตราย</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c53_hazard.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยน้ำท่วม  </td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c54_flood.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยแผ่นดินไหว</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c55_earthquake.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยดินถล่ม</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c56_landslide.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยหลุมยุบ </td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c57_sinkhole.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยแล้ง</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c58_drought.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>แหล่งมลพิษ</td>
                                      <td>ที่มีจุดกำเนิดแน่นอน </td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c59_point_source.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ที่ไม่ทราบจุดกำเนิดแน่นอน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c60_non_point_source.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลสภาพภูมิอากาศ </td>
                                      <td>ปริมาณน้ำฝนเฉลี่ย ๓๐ ปี</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c61_rf30y.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>อุณหภูมิอากาศเฉลี่ย ๓๐ ปี</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c62_temp30y.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>การบุกรุกป่าไม้</td>
                                      <td>การบุกรุกป่าไม้</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c63_encroachforest.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>พื้นที่ชุ่มน้ำ น้ำซับ น้ำจำ</td>
                                      <td>พื้นที่ชุ่มน้ำ น้ำซับ น้ำจำ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c64_wetland.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>โป่งดิน โป่งน้ำ โป่งเทียม</td>
                                      <td>โป่งดิน โป่งน้ำ โป่งเทียม</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c65_saltearth.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> I-S-N-R-E Project v2.0. 2016 © All rights reserved. </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
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
</body>

</html>
