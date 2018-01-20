<!doctype html>
<html lang="en">
<?php
include('../../libs/config_omfs.php');

session_start();
$strpg = "SELECT * FROM user_profile  WHERE iden_number = '".$_SESSION['iden_number']."'   ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

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
                <li>
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
                    <a href="p-upload.php">
                        <i class="pe-7s-cloud-upload"></i>
                        <p>อัพโหลดข้อมูล </p>
                    </a>
                </li>
                <li class="active">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ดาวน์โหลดข้อมูลภูมิสารสนเทศ</h4>
                            </div>
                            <div class="content">

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
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตจังหวัด</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/province.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตอำเภอ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/amphoe.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตตำบล </td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/tambon.zip" download=""><i class="fa fa-download"></i></a></center></td>
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
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลคุณภาพสิ่งแวดล้อม</td>
                                      <td>จุดตรวจวัดทางอุตุนิยมวิทยา</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>จุดตรวจวัดเสียง</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>จุดตรวจวัดคุณภาพอากาศ</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ตำแหน่งสถานีตรวจวัดคุณภาพน้ำ</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
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
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
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
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลทรัพยากรดิน</td>
                                      <td>แผนที่ดิน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c31_soil.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลทรัพยากรป่าไม้ </td>
                                      <td>ขอบเขตชนิดของป่าไม้ </td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ป่าสงวนแห่งชาติ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>อุทยานแห่งชาติ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>วนอุทยาน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตรักษาพันธุ์สัตว์ป่า</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>เขตห้ามล่าสัตว์ป่า</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>การใช้ประโยชน์พื้นที่ปาไม้</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c38_forestzoning.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่ สปก.</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c39_alro.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลการใช้ที่ดิน</td>
                                      <td>ประเภทการใช้ที่ดิน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c40_landuse.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่ศักยภาพในการใช้ที่ดิน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลสถานที่สำคัญ</td>
                                      <td>แหล่งศิลปกรรม</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c41_heritage.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลโครงสร้างพื้นฐานและสาธารณูปโภค</td>
                                      <td>ถนน</td>
                                      <td>Line</td>
                                      <td><center><a href="../datasets/c42_road.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ถนนสายหลัก</td>
                                      <td>Line</td>
                                      <td><center><a href="../datasets/c43_mainroad.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ทางรถไฟ</td>
                                      <td>Line</td>
                                      <td><center><a href="../datasets/c44_rail.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ท่าเรือ</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c45_harbour.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ท่าอากาศยาน</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c46_airport.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ไฟฟ้า</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c47_electr.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ประปา</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c48_watersupply.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>โทรศัพท์</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c49_telephone.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ที่ตั้งโรงงานอุตสาหกรรม</td>
                                      <td>Point </td>
                                      <td><center><a href="../datasets/.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>โรงพยาบาล</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c50_hospital.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>โรงเรียน</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c51_school.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ศาสนสถาน</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c52_religious.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>สถานีตำรวจ</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>สถานีบริการเชื้อเพลิง</td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c53_gasoline.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ไปรษณีย์ </td>
                                      <td>Point</td>
                                      <td><center><a href="../datasets/c54_postoffice.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลพื้นที่เสี่ยงภัย</td>
                                      <td>พื้นที่เสี่ยงภัยจากสารอันตราย</td>
                                      <td>Polygon</td>
                                      <td><center><a href="../datasets/c55_hazard.zip" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยน้ำท่วม  </td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยแผ่นดินไหว</td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยดินถล่ม</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยหลุมยุบ </td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>พื้นที่เสี่ยงภัยแล้ง</td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>แหล่งมลพิษ</td>
                                      <td>ที่มีจุดกำเนิดแน่นอน </td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>ที่ไม่ทราบจุดกำเนิดแน่นอน</td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>กลุ่มชั้นข้อมูลสภาพภูมิอากาศ </td>
                                      <td>ปริมาณน้ำฝนเฉลี่ย ๓๐ ปี</td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td>อุณหภูมิอากาศเฉลี่ย ๓๐ ปี</td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>การบุกรุกป่าไม้</td>
                                      <td>การบุกรุกป่าไม้</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>พื้นที่ชุ่มน้ำ น้ำซับ น้ำจำ</td>
                                      <td>พื้นที่ชุ่มน้ำ น้ำซับ น้ำจำ</td>
                                      <td>Polygon</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                                  <tr>
                                      <td>โป่งดิน โป่งน้ำ โป่งเทียม</td>
                                      <td>โป่งดิน โป่งน้ำ โป่งเทียม</td>
                                      <td>Point</td>
                                      <td><center><a href="#" download=""><i class="fa fa-download"></i></a></center></td>
                                  </tr>
                              </tbody>
                          </table>
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

	<!-- <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "ยินดีต้อนรับ <b>เข้าสู่ระบบ OMFS </b> <br> ท่านเข้าใช้งานในส่วนของผู้ใช้งานทั่วไป"

            },{
                type: 'danger',
                timer: 4000
            });

    	});
	</script> -->

</html>
