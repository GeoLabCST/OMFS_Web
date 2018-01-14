
<style>
body{background: #eeeeee;margin:0 auto;}
#form_upload{margin:0px auto;}
#showimage{margin:100px auto 20px auto;}
</style>
<?php
//include our config db
include ('config.php');




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


			 // so all clear, lets save our image to database
           $is_uploaded = pg_query( "UPDATE user_profile SET pic_user ='$rnd_name1' WHERE id_user = '$id' ; " );
            
            // check if it uploaded successfully, if so then display success message otherwise the erroror message in the else statement
            if( $is_uploaded )
                echo "<div id=\"showimage\"><center> อัพโหลดรูปภาพเรียบร้อยแล้ว <p> <img width=150 src='$showpic'></center></div>";
            else
                $error = '<center>erroror ไม่สามารถอัพโหลดรูปภาพได้ กรุณาลองอีกครั้ง </center>';
 
 
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


<!--please do not tear or rip enctype, this is the most important form parameters in uploading files-->
<form enctype="multipart/form-data" method="post">
    <fieldset>
        <p><label for="file">เลือกไฟล์ : </label><br/>
            <input type="file" name="file" />
        </p>
        <p>
            <input type="hidden" name="task" value="upload" />
            <input type="submit" value="Upload File" />
        </p>
    </fieldset>
</form>