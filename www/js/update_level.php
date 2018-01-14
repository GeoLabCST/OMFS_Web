<?php
include('../config.php');

	
				$status_user = $_GET['status_user'];
				$id_user = $_GET['id'];
				


				$sql2 = "update  user_profile  set  
				status_user = '$status_user' 
				where id_user =  $id_user;"; 

				$result = pg_query($db,$sql2);


		header("Location: ../request.php");
	
?>