<?php 
include('../libs/config_omfs.php');


$email = $_POST["email_user"];

$sql1 = "select * from user_profile  where email_user = '$email' ";
$query = pg_query($sql1);
$num = pg_num_rows($query);
if ($num < 1){


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
            imagejpeg( $dst1, 'img/pic_user/'.$rnd_name1, 100 );
 
            // I think that's it we're good to clear our created images
            imagedestroy( $source );
            imagedestroy( $dst1 );

  $is_uploaded = pg_query( "INSERT INTO user_profile 
		( name_user,lname_user,tel_user,prov_user,amp_user,tam_user,pic_user,email_user,pass_user,level_user,status_user,iden_number)
		VALUES (
		'".$_POST["name_user"]."',
		'".$_POST["lname_user"]."',
		'".$_POST["tel_user"]."',
		'".$_POST["prov_name"]."',
		'".$_POST["amphoe_name"]."',
		'".$_POST["tambon_name"]."',
			'$rnd_name1',
		'".$_POST["email_user"]."',
		'".$_POST["pass_user"]."',
		'".$_POST["level_user"]."',
		'register_web',
        '".$_POST["iden_number"]."'

		)" );

$id = $_POST["email_user"];
$pass = $_POST["pass_user"];

	header("Location: checklogin.php?email_user=$id&pass_user=$pass");



        }
 
    }
}







}else{ 
         header("Location: register_1.html");
      }


function get_file_extension( $file )  {
    if( empty( $file ) )
        return;
 
    // if goes here then good so all clear and good to go
    $ext = end(explode( ".", $file ));
 
    // return file extension
    return $ext;
};

echo $error;
?>

