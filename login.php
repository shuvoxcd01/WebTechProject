<?php
	if(isset($_COOKIE["uname"]) && isset($_COOKIE["randval"])){
		require("db_conn.php");
		
		$query = "select * from login";
		$userData = getData($query);
			
		foreach($userData as $data){
			if($data["uname"] == $_COOKIE["uname"] && $data["randval"] == $_COOKIE["randval"]){
				$_SESSION["uname"] = $uname;
				$_SESSION["nid"]=$data["nid"];
				
				header("location:login_successful.php");
				exit(0);
			}
		}
		
		
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log_unsuccessful</title>
	</head>
	
	<body style="background: linear-gradient(to bottom, #333300 50%, #999966 100%);color:white;text-align:center;">
	
		<div style=" padding:200px 0px; ">
				<h1><i>Login unsuccessful!!!</i></h1> 
				<h3><i>Please enter correct username and password</i></h3>
				<hr/>
				<form action="login_auth.php" method="post" style="float:center">
					username: <br/>
					<input type="text" name="uname"> <br/>
					password: <br/>
					<input type = "password" name="password"> <br/><br/>
					<input type = "submit" value="log in"> 
				</form>
				<form action="signup.php" method="post">
					<p>OR</p>
					<input type="submit" value="sign up"/>
				
				</form>
		</div>
		
	</body>
</html>