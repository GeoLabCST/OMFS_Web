<?php
include('../../../libs/config_omfs.php');

session_start();
	
				$iden_number = $_GET['iden_number'];
				$pass_user = $_GET['pass_user_new'];
				$id_user = $_GET['id_user'];
				

				$sql2 = "update  user_profile  set  
				iden_number = '".trim($_GET['iden_number'])."'  , 
				pass_user = '".trim($_GET['pass_user_new'])."' 

				where id_user =  $id_user;"; 

				$result = pg_query($db,$sql2);

echo "<script>
			alert('ทำการเปลี่ยน E-Mail หรือรหัสผ่านเรียบร้อยแล้ว');
			window.location='../../checklogin.php?iden_number=$iden_number&pass_user=$pass_user';
		  </script>";

		// header("Location: ../checklogin.php?email_user=$email_user&pass_user=$pass_user ");
	
?>