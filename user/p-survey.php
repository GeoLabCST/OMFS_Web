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
                <li class="active">
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
                                <h4 class="title">เลือกพื้นที่</h4>
                                <p class="category">เลือกขอบเขตการปกครองที่สนใจ</p>
                            </div>
                            <div class="content">
                                
                                <div class="form-group">
                                    <label>เลือก</label>
                                    <select class="form-control" id="province">
                                        <option value='all'>จังหวัด</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>เลือก</label>
                                    <select class="form-control" id="amphoe">
                                        <option value='all'>อำเภอ</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>เลือก</label>
                                    <select class="form-control" id="tambon">
                                        <option value='all'>ตำบล</option>
                                    </select>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <row>
                                        <div class="stats" id="p"></div>
                                        <div class="stats" id="a"></div>
                                        <div class="stats" id="t"></div>
                                    </row>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ตำแหน่งการแจ้ง</h4>
                                <p class="category">ตำแหน่งการรับแจ้งพื้นที่เกิดไฟป่า</p>
                            </div>
                            <div class="content">
                                <iframe src="map.php?procode=all&lon=99.85&lat=16.8" style="width: 100%; height: 650px" frameborder="0" scrolling="no" id="mframe" ></iframe>
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

    <script>
    function getProv(){
        $.getJSON("http://cgi.uru.ac.th/service/hms_prov.php", function (data) {
        //console.log(data);
          $.each(data, function (index, value) {
              $('#province').append('<option value="' + value.prov_code + '">' + value.prov_nam_t + '</option>');
          });
      });
    }

    function getAmp(proCode){
        $.getJSON("http://cgi.uru.ac.th/service/hms_amp.php?procode="+proCode, function (data) {
          $.each(data, function (index, value) {
              $('#amphoe').append('<option value="' + value.amp_code + '">' + value.amp_nam_t + '</option>');
          });
      });
    }

    function getTam(ampCode){
        $.getJSON("http://cgi.uru.ac.th/service/hms_tam.php?ampcode="+ampCode, function (data) {
          $.each(data, function (index, value) {
              $('#tambon').append('<option value="' + value.tam_code + '">' + value.tam_nam_t + '</option>');
          });
      });
    }

    //select
    $(document).ready(function () {
      // load province data
      getProv();  
      // load prov iframe
      $('#province').change(function () {          
        $('#amphoe').empty();
        $('#amphoe').append('<option value="all">อำเภอ</option>');
        var provCode = this.options[this.selectedIndex].value;
        var provName = this.options[this.selectedIndex].text;
        if(provCode=='all'){
            $.getJSON("http://cgi.uru.ac.th/service/hms_prov.php?procode=all", function (data) {                 
                $("#mframe").attr("src", "map.php?procode=all&lon=99.85&lat=16.8");
            });
        }else{
            $.getJSON("http://cgi.uru.ac.th/service/hms_prov.php?procode="+provCode, function (data) {                 
                $("#mframe").attr("src", "map.php?procode="+provCode+"&lon="+data[0].lon+"&lat="+data[0].lat);
            });
            getAmp(provCode);
        } 
        $('#p').text('จังหวัด: '+ provName);        
      });

      //get amp iframe
      $('#amphoe').change(function () {          
        $('#tambon').empty();
        $('#tambon').append('<option value="all">ตำบล</option>');
        var ampCode = this.options[this.selectedIndex].value;
        var ampName = this.options[this.selectedIndex].text;
        
            $.getJSON("http://cgi.uru.ac.th/service/hms_amp.php?ampcode="+ampCode, function (data) {                 
                $("#mframe").attr("src", "map.php?ampcode="+ampCode+"&lon="+data[0].lon+"&lat="+data[0].lat);
            });
            getTam(ampCode);
        
        $('#a').text('อำเภอ: '+ ampName);       
      });

      //get tam iframe
      $('#tambon').change(function () {
        var tamCode = this.options[this.selectedIndex].value;
        var tamName = this.options[this.selectedIndex].text;
        
            $.getJSON("http://cgi.uru.ac.th/service/hms_tam.php?tamcode="+tamCode, function (data) {                 
                $("#mframe").attr("src", "map.php?tamcode="+tamCode+"&lon="+data[0].lon+"&lat="+data[0].lat);
            });
        
        $('#t').text('ตำบล: '+ tamName);       
      });

    });
    </script>

</html>
