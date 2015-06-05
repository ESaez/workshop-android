<?php
session_start();
$hostname_localhost ="localhost";
$database_localhost ="bddworkshop";
$username_localhost ="root";
$password_localhost ="";
$localhost = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
 
mysql_select_db($database_localhost, $localhost);

$user = $_REQUEST['user'];

	$sql = "SELECT usuarios_comuna FROM usuarios WHERE usuarios_usuario='".$user."'";
$datos=array();
  $rs=mysql_query($sql);


$rows = mysql_num_rows($rs);
if($rows == 0) { 
	echo "Usuario no encontrado"; 
}
else  {
 	$comuna = mysql_fetch_array($rs);
 	echo $comuna["usuarios_comuna"];
}




?>