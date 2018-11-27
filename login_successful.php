<?php 
	session_start();
	if(!isset($_SESSION["uname"])){
		exit("Invalid Session");
	}
	
	require("db_conn.php");
	$randval = mt_rand();
	$q="select * from user";
	$userdata=getData($q);
	
	//====================================
	//remove comment out!!!!!
	foreach($userdata as $data)
	{
		if($data["uname"]==$_SESSION["uname"]&& $data["validity"]==null)
			exit("Account Invalid!!!!Please wait for approval from admin.");	
	}
	
	
	$query = "update login set randval='".$randval."'where uname='".$_SESSION['uname']."'";
	if(execQuery($query)){
		setcookie("uname",$_SESSION["uname"], time()+1000*60*24*30, "/" );
		setcookie("randval", $randval, time()+1000*60*24*30, "/");
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log_in_successfull</title>
		<script src="ajax_for_login_successful.js"> </script>
	</head>
	
	<body style="background: linear-gradient(to bottom, #333300 50%, #999966 100%);color:white;text-align:center;">
		
		
	
		<div style=" padding:70px 0px; float:left ">
			
			<div style="float:right">
				<form action="logout.php">
					<input type = "submit" value="Logout">
				</form>
			</div>	
			
			<?php
			 echo "<h1><i>Welcome, " .$_SESSION["uname"]. "</i></h1>";
			?>
			<hr/>
			
			<input style="width:200px;font-size:30px" type = "button" value="My Profile" name="profile" onclick="loadPage('profile')"/> <br/>
		
	
			<input style="width:200px;font-size:30px"    type="button" value="Account" name="account" onclick="loadPage('account')"/><br/>
		
		
			
			
			
		</div>
		
		<div id="sideDiv" style="float:right">
			
			
		</div>
		
	</body>
</html>