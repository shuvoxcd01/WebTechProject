<?php
	require("db_conn.php");

	$query = "select uname from login where uname = '".$_GET['uname']."'";
	$_arr = getData($query);
	
	if(sizeof($_arr) > 0) echo "username already taken";
?>