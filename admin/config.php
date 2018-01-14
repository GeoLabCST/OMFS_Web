<?php
$hostname_db = "119.59.125.189";
$database_db = "omfs";
$username_db = "postgres";
$password_db = "##firehp@postgis##";

$db = pg_connect("host=$hostname_db user=$username_db password=$password_db dbname=$database_db") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'"); 



/* session_start();
$strpg = "SELECT * FROM user_profile  WHERE email_user = '".$_SESSION['email_user']."'   ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

    $status = $objResult[status_user];

    $id = $objResult[id_user];

    if($_SESSION['email_user'] == "")
    {
        header('Location: ../');
        exit();
    }

    else if($status != "super_admin")
    {
        header('Location: ../');
        exit();
    }
 */




?>