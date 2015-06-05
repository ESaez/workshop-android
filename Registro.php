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
$correo = $_REQUEST['correo'];
$telefono =$_REQUEST['telefono'];
$comuna =$_REQUEST['comuna'];

$sql = "SELECT usuarios_id 
		FROM usuarios 
		WHERE usuarios_telefono = '".$telefono."'";

$rs = mysql_query($sql);
$rows = mysql_num_rows($rs);

if($rows == 0) { 

	$sql = "SELECT usuarios_id 
			FROM usuarios 
			WHERE usuarios_usuario = '".$user."'";

	$rs = mysql_query($sql);
	$rows = mysql_num_rows($rs);

	if($rows == 0) { 
		$sql = "INSERT INTO usuarios 
				VALUES ('','".$user."','".$password."','".$correo."',now(), '+".$telefono."', '".$comuna."')";

		$rs = mysql_query($sql);

		$sql = "SELECT usuarios_id 
				FROM usuarios 
				WHERE usuarios_usuario = '".$user."'";

		$rs = mysql_query($sql);
		$rows = mysql_num_rows($rs);

		if($rows == 0) { 
			echo "Usuario no registrado"; 
		}
		else  {
		    echo "Usuario registrado"; 
		}
	}
	else  {
	    echo "Usuario ya existe"; 
	}

}else{
	echo "Telefono ya existe";
}




  ?>