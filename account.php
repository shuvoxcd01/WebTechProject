<?php 
	session_start();
	if(!isset($_SESSION["uname"])){
		exit("Invalid Session");
	}
	
	require("db_conn.php");
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Account</title>
	</head>
	
	<body>
	
		
	

		<div style="width:100%;float:left;height:700px; padding-right:500px ;background: linear-gradient(to bottom, #333300 0%, #999966 100%);color:white; text-align:center">
		<h1>Account Menu<h1>	
        		
		<form action="account_details.php" method="post">
		<input style="width:250px;font-size:30px" type = "submit" value="Account Details" name="account_details" /> <br/>	
		</form>
		<form action="withdraw.php" method="post" >
		<input style="width:250px;font-size:30px" type = "submit" value="Withdraw" name="withdraw" /> <br/>	
		</form>
		
		
		</div>
			
					
		
	
		
	</body>
</html>