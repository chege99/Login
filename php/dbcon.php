<?php
//This script will just contain the database configurations -> For reusng purposes

########## MySql details -- Replace With Yours #############
$username = "root"; 				//mysql username
$password = ""; 					//mysql password
$hostname = "localhost"; 			//hostname
$databasename = 'Login'; 	//databasename
$sql_error = "Mysql connection is incorrect"; // Error to be displayed if the connection is not successful


//This is just a connection string
$link = mysqli_connect($hostname,$username,$password)
 or die($sql_error);

//Select database using the connection string above -> ($link) 
$query_db = mysqli_select_db($link, $databasename);

//Finally, Test if the database Connection is successful. if it is not successful, an error message will be displayed, if successfull, nothing will be displayed

if ( !$query_db )
{
  die ("Database was not found");
}

?>