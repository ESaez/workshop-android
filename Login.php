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
$password = $_REQUEST['password'];


$sql = "SELECT usuarios_id 
		FROM usuarios 
		WHERE usuarios_usuario = '".$user."' AND usuarios_password = '".$password. "'";


$rs = mysql_query($sql);

$rows = mysql_num_rows($rs);
//echo $rows;
if($rows == 0) { 
	echo "Usuario no encontrado"; 
}
else  {
    echo "Usuario encontrado"; 
}


  ?>