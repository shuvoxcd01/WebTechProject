<?php 
	
	session_start();
	if(!isset($_SESSION["uname"])){
		exit("Invalid Session");
	}
	
	require("db_conn.php");
	$randval = mt_rand();
	$query = "update login set randval='".$randval."'where uname='".$_SESSION['uname']."'";
	if(execQuery($query)){
		setcookie("uname",$_SESSION["uname"], time()+1000*60*24*30, "/" );
		setcookie("randval", $randval, time()+1000*60*24*30, "/");
	}
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		
	</head>
	
	<body style="background: linear-gradient(to bottom, #333300 50%, #999966 100%) fixed;color:white;text-align:center;">
		
		<?php
			 echo "<span style='font-size:large'><b><i>Welcome, ".$_SESSION["uname"]. "</i></h1></span>";
			 $padding = 0;  //this variable is used later
		?>
	
		<div style="float:right">
			<form action="logout.php">
				<input type = "submit" value="Logout">
			</form>
		</div>	
			
		<hr/>

		<div style=" padding:70px 0px; float:left;text-align:left ">
			<div style="text-align:right">
				<input  type = "button" value="Registration Requests" name="Registration Requests" onclick="loadPage('registration_request','query_div')"/> <br/><br/>
			
				<input  type="button" value="Users" name="Users" onclick="loadPage('show_users_for_admin','query_div')"/><br/><br/>

				<input  type="button" value="Custom Query" name="Custom Query" onclick="loadPage('admin_custom_query','query_div')"/>
			</div>
			
		</div>
		<div style="float:left; background-color:red"> </div>
	
		<div style="float:left; padding:70px 100px;">
			<?php
				
				for($i=0; $i < $padding; $i++){
					echo "<br/>";
				}
			?>
			<span id='query_div'> </span>
		</div>
		<div style='padding:70px 0px; text-align:left; float:right' id = 'query_result'>
		</div>
			
		
		<script src="ajax_for_admin_login.js"> </script>
	</body>
</html>