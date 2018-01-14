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
    <link href="
https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">






 <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} 
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} 
           try { return new XMLHttpRequest();          } catch(e) {}
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; 
                       } 
                  }
             };
             req.open("GET", "../localtion.php?data="+src+"&val="+val); 
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
             req.send(null); 
        }

        window.onLoad=dochange('province2', -1);  
    </script>
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
                        <h4 class="page-title">รายชื่อสมาชิก</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="./">หน้าแรก</a></li>
                            <li class="active">รายชื่อสสมาชิก</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <ul class="nav nav-pills">
                              <li class="active"><a data-toggle="pill" href="#home">รายชื่อรอยืนยันสิทธิ์</a></li>
                              <li><a data-toggle="pill" href="#menu1">ระดับปฏิบัติการ/ผู้ใช้ทั่วไป</a></li>
                              <li><a data-toggle="pill" href="#menu2">ระดับผู้วิเคราะห์</a></li>
                              <li><a data-toggle="pill" href="#menu3">ระดับผู้บริหาร</a></li>
                            </ul>

                            <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                <table id="example1" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result1 = pg_query("SELECT * FROM user_profile where status_user = 'register_web' or status_user = 'register_app' ; ");
while ($arr1 = pg_fetch_array($result1)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr1[name_user]; ?></td>
                                            <td><?php echo $arr1[lname_user]; ?></td>
                                            <td><?php echo $arr1[prov_user]; ?></td>
                                            <td><?php echo $arr1[email_user]; ?></td>
                                            <td><?php echo $arr1[tel_user]; ?></td>
                                            <td><?php echo $arr1[level_user]; ?></td>
                                            <td><form action="js/update_level.php">
                                                <input type="hidden" value="<?php echo $arr1[id_user]; ?>" name="id">
                                                    <select name="status_user" class="form-control"   onchange="return confirm('ยืนยันการบันทึก?'),this.form.submit()">
                                                        <option> สถานะปัจจุบัน : <?php echo $arr1[status_user]; ?> </option>
                                                        <option value="operational">Operational / ผู้ใช้ทั่วไป</option>
                                                        <option value="analytical">Analytical / นักวิเคราะห์</option>
                                                        <option value="executive">Executive / ผู้บริหาร</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td><center><a href="js/delete_user.php?id=<?php echo $arr1[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i></a></center></td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>
                              <div id="menu1" class="tab-pane fade">
                                <table id="example2" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result2 = pg_query("SELECT * FROM user_profile where status_user = 'operational' ; ");
while ($arr2 = pg_fetch_array($result2)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr2[name_user]; ?></td>
                                            <td><?php echo $arr2[lname_user]; ?></td>
                                            <td><?php echo $arr2[prov_user]; ?></td>
                                            <td><?php echo $arr2[email_user]; ?></td>
                                            <td><?php echo $arr2[tel_user]; ?></td>
                                            <td><?php echo $arr2[level_user]; ?></td>
                                            <td><form action="js/update_level.php">
                                                <input type="hidden" value="<?php echo $arr2[id_user]; ?>" name="id">
                                                    <select name="status_user" class="form-control"   onchange="return confirm('ยืนยันการบันทึก?'),this.form.submit()">
                                                        <option> สถานะปัจจุบัน : <?php echo $arr2[status_user]; ?> </option>
                                                        <option value="operational">Operational / ผู้ใช้ทั่วไป</option>
                                                        <option value="analytical">Analytical / นักวิเคราะห์</option>
                                                        <option value="executive">Executive / ผู้บริหาร</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td><center><a href="js/delete_user.php?id=<?php echo $arr2[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i></a></center></td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>
                              <div id="menu2" class="tab-pane fade">
                                <table id="example3" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result3 = pg_query("SELECT * FROM user_profile where status_user = 'analytical' ; ");
while ($arr3 = pg_fetch_array($result3)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr3[name_user]; ?></td>
                                            <td><?php echo $arr3[lname_user]; ?></td>
                                            <td><?php echo $arr3[prov_user]; ?></td>
                                            <td><?php echo $arr3[email_user]; ?></td>
                                            <td><?php echo $arr3[tel_user]; ?></td>
                                            <td><?php echo $arr3[level_user]; ?></td>
                                            <td><form action="js/update_level.php">
                                                <input type="hidden" value="<?php echo $arr3[id_user]; ?>" name="id">
                                                    <select name="status_user" class="form-control"   onchange="return confirm('ยืนยันการบันทึก?'),this.form.submit()">
                                                        <option> สถานะปัจจุบัน : <?php echo $arr3[status_user]; ?> </option>
                                                        <option value="operational">Operational / ผู้ใช้ทั่วไป</option>
                                                        <option value="analytical">Analytical / นักวิเคราะห์</option>
                                                        <option value="executive">Executive / ผู้บริหาร</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td><center><a href="js/delete_user.php?id=<?php echo $arr3[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i></a></center></td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>
                              <div id="menu3" class="tab-pane fade">
                                <table id="example4" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result4 = pg_query("SELECT * FROM user_profile where status_user = 'executive' ; ");
while ($arr4 = pg_fetch_array($result4)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr4[name_user]; ?></td>
                                            <td><?php echo $arr4[lname_user]; ?></td>
                                            <td><?php echo $arr4[prov_user]; ?></td>
                                            <td><?php echo $arr4[email_user]; ?></td>
                                            <td><?php echo $arr4[tel_user]; ?></td>
                                            <td><?php echo $arr4[level_user]; ?></td>
                                            <td><form action="js/update_level.php">
                                                <input type="hidden" value="<?php echo $arr4[id_user]; ?>" name="id">
                                                    <select name="status_user" class="form-control"   onchange="return confirm('ยืนยันการบันทึก?'),this.form.submit()">
                                                        <option> สถานะปัจจุบัน : <?php echo $arr4[status_user]; ?> </option>
                                                        <option value="operational">Operational / ผู้ใช้ทั่วไป</option>
                                                        <option value="analytical">Analytical / นักวิเคราะห์</option>
                                                        <option value="executive">Executive / ผู้บริหาร</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td><center><a href="js/delete_user.php?id=<?php echo $arr4[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i></a></center></td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>


                            </div>
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

    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!--     <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>-->
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>



<script>
    $(document).ready(function() {

    $('#example1').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('#example2').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('#example3').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('#example4').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );



} );

</script>





</body>

</html>
