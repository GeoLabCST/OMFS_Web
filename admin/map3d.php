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
                       <img src="http://119.59.125.189/share/isnre.png" alt="home" width="70%" />

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
                        <a href="gis.php" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>ระบบภูมิสารสนเทศ</a>
                    </li>
                    <li>
                        <a href="map3d.php" class="waves-effect"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>ระบบภูมิศาสตร์สามมิติ</a>
                    </li>
                    <li>
                        <a href="formula.php" class="waves-effect"><i class="fa fa-cloud fa-fw" aria-hidden="true"></i>ระบบก๊าซเรือนกระจก</a>
                    </li>
                    <li>
                        <a href="map_1.php" class="waves-effect"><i class="fa fa-history fa-fw" aria-hidden="true"></i>ระบบการตัดสินใจ</a>
                    </li>
                    <li>
                        <a href="forest.php" class="waves-effect"><i class="fa fa-tree fa-fw" aria-hidden="true"></i>ข้อมูลพื้นที่ป่า</a>
                    </li>
                    <li>
                        <a href="weather.php" class="waves-effect"><i class="fa fa-umbrella fa-fw" aria-hidden="true"></i>ระบบภูมิอากาศ</a>
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
                        <h4 class="page-title">ระบบภูมิศาสตร์สามมิติ</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="./">หน้าแรก</a></li>
                            <li class="active">ระบบภูมิศาสตร์สามมิติ</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <form  target="video">
                            <div class="panel-group" id="accordion">
                                    <h2>Map 4 D</h2>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ภาคกลาง">
                                    ภาคกลาง</a>
                                  </h4>
                                </div>
                                <div id="ภาคกลาง" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <ul>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/W2vcZym-mwk">จังหวัดปทุมธานี</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/NA4EfG-_9wY">จังหวัดสระบุรี</button> <a href=""></a> </li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ภาคเหนือ">
                                    ภาคเหนือ</a>
                                  </h4>
                                </div>
                                <div id="ภาคเหนือ" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <ul>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/njJ82QXpjMA">จังหวัดพะเยา</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/eYveLfoT-uw">จังหวัดพิษณุโลก</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/WPf-xN7FRqA">จังหวัดอุตรดิตถ์</button> <a href=""></a> </li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ภาคใต้">
                                    ภาคใต้</a>
                                  </h4>
                                </div>
                                <div id="ภาคใต้" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <ul>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/97KsL60GPIQ">จังหวัดกระบี่</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/r3s9P5jV_XY">จังหวัดพัทลุง</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/rVofHFOdnYY">จังหวัดประจวบคีรีขันธ์</button> <a href=""></a> </li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ภาคตะวันออกเฉียงเหนือ">
                                    ภาคตะวันออกเฉียงเหนือ</a>
                                  </h4>
                                </div>
                                <div id="ภาคตะวันออกเฉียงเหนือ" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <ul>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/ghdzh7kgeg8">จังหวัดสุรินทร์</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/OEhV0w7DBa4">จังหวัดบึงกาฬ</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/lXxlAr2iGzI">จังหวัดขอนแก่น</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/5JBIuEvxahA">จังหวัดสระแก้ว</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/eJgz-p5bq-Y">จังหวัดบุรีรัมย์</button> <a href=""></a> </li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ภาคตะวันออก">
                                    ภาคตะวันออก</a>
                                  </h4>
                                </div>
                                <div id="ภาคตะวันออก" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <ul>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/u0sG2A2YC2s">จังหวัดระยอง</button> <a href=""></a> </li>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/NWCEe2C1_rw">จังหวัดปราจีนบุรี</button> <a href=""></a> </li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ภาคตะวันตก    ">
                                    ภาคตะวันตก</a>
                                  </h4>
                                </div>
                                <div id="ภาคตะวันตก" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <ul>
                                          <li><button class="btn btn-link" formaction="https://www.youtube.com/embed/duwB70obets">จังหวัดราชบุรี</button> <a href=""></a> </li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                            </div>
                            </form>
                        </div>
                    </div>
                  
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <iframe width="100%" height="550" src="https://www.youtube.com/embed/W2vcZym-mwk" frameborder="0"  name="video"></iframe>
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
