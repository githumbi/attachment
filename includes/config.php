<?php

$host="localhost";
$user= "root";
$pass="";
$db="club";
$con= mysqli_connect($host,$user,$pass,$db);


if(!$con)
{
	exit("Error: Database Connection not established");
}

/*if(!mysqli_select_db ($con,$db))
{
	exit("Error: Database not selected");
}
*/
?>