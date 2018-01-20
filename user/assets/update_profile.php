<?php
include('../../../libs/config_omfs.php');

session_start();
	
				$name_user = $_GET['name_user'];
				$lname_user = $_GET['lname_user'];
				$tel_user = $_GET['tel_user'];
				$prov_user = $_GET['prov_name'];
				$amp_user = $_GET['amphoe_name'];
				$tam_user = $_GET['tambon_name'];
				$email_user = $_GET['email_user'];
				$id_user = $_GET['id_user'];
				


				$sql2 = "update  user_profile  set  
				name_user = '$name_user' , 
				lname_user = '$lname_user', 
				tel_user = '$tel_user', 
				prov_user = '$prov_user'  , 
				amp_user = '$amp_user'  , 
				tam_user = '$tam_user' ,
				email_user = '$email_user'  

				where id_user =  $id_user;"; 

				$result = pg_query($db,$sql2);


		header("Location: ../p-user.php");
	
?>