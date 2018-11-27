<?php
	require('db_conn.php');
	$confirmation = $_REQUEST['conf'];
	$nid = $_REQUEST['nid'];
	if($confirmation == 'true'){
		$query = "UPDATE user SET validity='true' WHERE nid='".$nid."'";
		execQuery($query);
		$query = "DELETE FROM registration_req WHERE nid='".$nid."'";
		execQuery($query);
		$acc_no = mt_rand();
		$query = "INSERT INTO user_account(acc_no, nid,balance) VALUES ('".$acc_no."','".$nid."','10000')";
		execQuery($query);
		$query = "INSERT INTO balance(added_amount,added_date) VALUES ('10000','".date("Y/m/d")."')";
		execQuery($query);
		
	}
	else{
		$query = "DELETE FROM user WHERE nid='".$nid."'";
		execQuery($query);
		$query = "DELETE FROM user_account WHERE nid='".$nid."'";
		execQuery($query);
		$query = "DELETE FROM registration_req WHERE nid='".$nid."'";
		execQuery($query);
		$query = "DELETE FROM login WHERE nid='".$nid."'";
		execQuery($query);
	}
?>