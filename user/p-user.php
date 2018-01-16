<!doctype html>
<html lang="en">
<?php
include('../../libs/config_omfs.php');

session_start();
$strpg = "SELECT * FROM user_profile  WHERE email_user = '".$_SESSION['email_user']."'   ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

    $status = $objResult[status_user];


    if($_SESSION['email_user'] == "")
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
             req.open("GET", "assets/location_user.php?data="+src+"&val="+val); 
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
             req.send(null); 
        }

        window.onLoad=dochange('prov_name', -1);  
    </script>

</head>

<?php


$error = '';
$success = '';
 
if( isset( $_POST['task']) && 'upload' == $_POST['task'] ) 
{
    // get uploaded file name
    $image = $_FILES["file"]["name"];
 
    if( empty( $image ) ) {
        $error = 'File is empty, please select image to upload.';
    } else if($_FILES["file"]["type"] == "application/msword") {
        $error = 'Invalid image type, use (e.g. png, jpg, gif).';
    } else if( $_FILES["file"]["error"] > 0 ) {
        $error = 'Oops sorry, seems there is an error uploading your image, please try again later.';
    } else {
    
        // strip file slashes in uploaded file, although it will not happen but just in case ;)
        $filename = stripslashes( $_FILES['file']['name'] );
        $ext = get_file_extension( $filename );
        $ext = strtolower( $ext );
        
        if(( $ext != "jpg" ) && ( $ext != "jpeg" ) && ( $ext != "png" ) && ( $ext != "gif" ) ) {
            $error = 'Unknown Image extension.';
            return false;
        } else {
            // get uploaded file size
            $size = filesize( $_FILES['file']['tmp_name'] );
            
            // get php ini settings for max uploaded file size
            $max_upload = ini_get( 'upload_max_filesize' );
 
            // check if we're able to upload lessthan the max size
            if( $size > $max_upload )
                $error = 'You have exceeded the upload file size.';
 
            // check uploaded file extension if it is jpg or jpeg, otherwise png and if not then it goes to gif image conversion
            $uploaded_file = $_FILES['file']['tmp_name'];
            if( $ext == "jpg" || $ext == "jpeg" )
                $source = imagecreatefromjpeg( $uploaded_file );
            else if( $ext == "png" )
                $source = imagecreatefrompng( $uploaded_file );
            else
                $source = imagecreatefromgif( $uploaded_file );
 
            // getimagesize() function simply get the size of an image
            list( $width, $height) = getimagesize ( $uploaded_file );
            $ratio = $height / $width;
 
 
            // new width 100 in pixel format too
            $nw1 = 450;
            $nh1 = ceil( $ratio * $nw1 );
            $dst1 = imagecreatetruecolor( $nw1, $nh1 );
 
            imagecopyresampled( $dst1, $source, 0, 0, 0, 0, $nw1, $nh1, $width, $height );
 
            // rename our upload image file name, this to avoid conflict in previous upload images
            // to easily get our uploaded images name we added image size to the suffix
            $rnd_name1 = 'photos_'.uniqid(mt_rand(10, 15)).'_'.time().'_450x450.'.$ext;
            
            // move it to uploads dir with full quality
            imagejpeg( $dst1, '../img/pic_user/'.$rnd_name1, 100 );
 
            // I think that's it we're good to clear our created images
            imagedestroy( $source );
            imagedestroy( $dst1 ); 

            $showpic = "../img/pic_user/".$rnd_name1;


        $id_user = $_POST[id_user];
             // so all clear, lets save our image to database
           $is_uploaded = pg_query( "UPDATE user_profile SET pic_user ='$rnd_name1' WHERE id_user = '$id_user' ; " );
            
            
            if( $is_uploaded ) {
               header("Location: p-user.php");
            }
          
 
        }
 
    }
}


function get_file_extension( $file )  {
    if( empty( $file ) )
        return;
 
    // if goes here then good so all clear and good to go
    $ext = end(explode( ".", $file ));
 
    // return file extension
    return $ext;
}
?>




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
                    <a href="p-download.php">
                        <i class="pe-7s-cloud-download"></i>
                        <p>ดาวน์โหลดข้อมูล </p>
                    </a>
                </li>
                <li class="active">
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
                                <small> ออกจากระบบ</small>    
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


         <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">
    <div class="header">
         ข้อมูลผู้ใช้งาน
    </div></a></li>
  <li><a data-toggle="tab" href="#menu1"><div class="header">
         ข้อมูล E-Mail และ Password
    </div></a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
                            <div class="content">
                                <form action="assets/update_profile.php" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ชื่อ</label>
                                                <input type="text" class="form-control" name="name_user"  placeholder="" value="<?php echo $objResult[name_user]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>นามสกุล</label>
                                                <input type="text" class="form-control" name="lname_user" value="<?php echo $objResult[lname_user]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>เบอร์โทร</label>
                                                <input type="number" class="form-control"  name="tel_user" value="<?php echo $objResult[tel_user]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>เลขบัตรประจำตัวประชาชน</label>
                                                <input type="number" class="form-control"  name="iden_number" value="<?php echo $objResult[tel_user]; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">จังหวัด</label>
                                            <span id="prov_name">
                                                <select class="form-control" id="select" name="prov_name" >
                                                   <option value='<?php echo $objResult[prov_user] ?>'><?php echo $objResult[prov_user] ?></option>
                                                </select>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">อำเภอ</label>
                                            <span id="amphoe_name">
                                                <select class="form-control" id="select" name="amphoe_name" >
                                                   <option value='<?php echo $objResult[amp_user] ?>'><?php echo $objResult[amp_user] ?></option>
                                                </select>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ตำบล</label>
                                            <span id="tambon_name">
                                                <select class="form-control" id="select" name="tambon_name" data-cip-id="cIPJQ342845642">
                                                  <option value='<?php echo $objResult[tam_user] ?>'><?php echo $objResult[tam_user] ?></option>
                                                </select>
                                            </span>
                                            </div>
                                        </div>
                                    </div>

                                  
                                    <input type="hidden" name="id_user" value="<?php echo $objResult[id_user] ?>">

                                    <button type="submit" class="btn btn-default btn-fill pull-right">อัพเดตโปรไฟล์</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
  </div>
  <div id="menu1" class="tab-pane fade">

                            <div class="content">
                               <form class="form-horizontal form-material" action="assets/update_email.php">
                                        <div class="form-group">
                                            <label class="col-md-12">email</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" value="<?php echo $objResult[email_user] ?>" name="email_user"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">รหัสผ่าน</label>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control form-control-line" value="<?php echo $objResult[pass_user] ?>" name="pass_user_new"> </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="id_user" value="<?php echo $objResult[id_user] ?>">
                                    <button type="submit" class="btn btn-default btn-fill pull-right">แก้ไขรหัสผ่าน</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>

  </div>
</div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="http://119.59.125.191/shares/06.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     
                                    <img class="avatar border-gray" src="../img/pic_user/<?php echo $objResult[pic_user]; ?>" alt="..."/>

                                      <h4 class="title"><?php echo $objResult[name_user],' ',$objResult[lname_user] ; ?><br />
                                         <small><?php echo $objResult[name_user]; ?></small>
                                      </h4>
                                    
                                </div>
                                <p class="description text-center">สถานะ : <?php echo $objResult[status_user]; ?></p>
                                <small ><p class="description text-center"><a class="btn btn-link"  data-toggle="collapse" data-target="#demo">แก้ไขรูปประจำตัว</a></p></small>
<div id="demo" class="collapse">
<form enctype="multipart/form-data" method="post">
    <fieldset>
        <p><label for="file">เลือกไฟล์รูป : </label><br/>
            <input type="file" name="file" class="form-control" />
        </p>
        <p>
            <input type="hidden" name="id_user" value="<?php echo $objResult[id_user] ?>" />
            <input type="hidden" name="task" value="upload" />
            <input type="submit" class="btn btn-default btn-fill pull-right"  onClick="window.location.reload()" value="upload" />
        </p>
    </fieldset>
</form>
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
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
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
