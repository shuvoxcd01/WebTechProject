<?php
	session_start();
	require("db_conn.php");
	$randval = mt_rand();
	$query = "update login set randval='".$randval."'where UserName='".$_SESSION['uname']."'";
	if(execQuery($query)){
		setcookie("uname",$_SESSION["uname"], time()+1000*60*24*30, "/" );
		setcookie("randval", $randval, time()+1000*60*24*30, "/");
	}
	
?>