<?php
include('config.php');


session_start();
	

	$strpg = "SELECT * FROM user_profile WHERE email_user = '".pg_escape_string ($_GET['email_user'])."' 
and pass_user = '".pg_escape_string ($_GET['pass_user'])."' ;"   ;



	$objQuery = pg_query($strpg);

	$objResult = pg_fetch_array($objQuery);


// $name =  $objResult["name_user"];
// $lname =  $objResult["lname_user"];
// $level =  $objResult["status_user"];
// date_default_timezone_set('Asia/Bangkok');
// $date =  date("Y/m/d  H:i:s") ;
// $sql3 = "INSERT INTO count_stat (name_stat,lname_stat,level_stat,date_acces) values ('$name','$lname','$level','$date')";
// $result3 = pg_query( $sql3);


	if(!$objResult)
	{
		header("location:./");
	}
	else
	{
			$_SESSION["email_user"] = $objResult["email_user"];
			$_SESSION["status_user"] = $objResult["status_user"];

			session_write_close();
			
			
			if($objResult["status_user"] == "register_web")
			{
				header("location: user/");
			}
			
			else if($objResult["status_user"] == "register_app")
			{
				header("location: user/");
			}
			
			else if($objResult["status_user"] == "operational")
			{
				header("location: user/");
			}
			
			else if($objResult["status_user"] == "uesr")
			{
				header("location: uesr/");
			}
			
			else if($objResult["status_user"] == "analytical")
			{
				header("location: analytical/");
			}
			
			else if($objResult["status_user"] == "executive")
			{
				header("location: executive/");
			}
			
			else if($objResult["status_user"] == "super_admin")
			{
				header("location: admin/");
			}
			
			else if($objResult["status_user"] == "staff")
			{
				header("location: staff/");
			}
			
	}
	pg_close($db);
	
	

												
												?>