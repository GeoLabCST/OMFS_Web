<?php
$hostname_db = "119.59.125.191";
$database_db = "omfs";
$username_db = "postgres";
$password_db = "##firehp@postgis##";

$db = pg_connect("host=$hostname_db user=$username_db password=$password_db dbname=$database_db") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'"); 
?>