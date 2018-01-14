<?php
include('../config.php');

	
				$id_user = $_GET['id'];
				


				$sql2 = "DELETE from user_profile
				where id_user =  $id_user;"; 

				$result = pg_query($db,$sql2);


		header("Location: ../request.php");
	
?>