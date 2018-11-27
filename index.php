<?php
	if(isset($_COOKIE["uname"]) && isset($_COOKIE["randval"])){
		require("db_conn.php");
		
		$query = "select * from login";
		$userData = getData($query);
			
		foreach($userData as $data){
			if($data["uname"] == $_COOKIE["uname"] && $data["randval"] == $_COOKIE["randval"]){
				$_SESSION["uname"] = $uname;
				header("location:login_successful.php");
				exit(0);
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log_in</title>
	</head>
	
	<body>
		<div style="width:100%;height:130px;background: linear-gradient(to bottom, #333300 0%, #999966 100%);color:white; text-align:center; padding:10px">
			<span style="float:left; border:5px solid white; background-color:white"><br/><img src="bd_govt.png" height="100px" width="100px"/></span>
			<span style="float:right; padding-top:10px;padding-right: 150px;">
				<form action="login_auth.php" method="post" style="float:left">
					username: <br/>
					<input type="text" name="uname"> <br/>
					password: <br/>
					<input type = "password" name="password"> <br/><br/>
					<input type = "submit" value="log in"> <br/>
					
				</form>
				
				<form style="float:right ;" action="signup.php" method="post">
					<br/>
					<br/>
					OR, <input type="submit" value="sign up"/>
				</form>
				
				
			</span>
			
			<span style="font-size:40px; text-align:center"><br/><b><i>Allowance Providing System</i></b></span>
			
			  
			  
		
		</div>
		<div style="height:1000px; width:15%; background: linear-gradient(to top, #333300 0%, #999966 100%);float:left; color:white;text-align:center">
		</div>
		<div style="width:101%;height:1000px;;background: linear-gradient(to top, #333300 0%, #999966 100%) fixed">
			<span style="text-align:center; font-size:large">
				Our allowance system is designed to provide all the users their money 
				and all other services in online. We have two type of users. They are admin and general users. 
				Admin panel has many roles. They confirm the registration of users through checking NID , age and
				some other criteria. They can take actions over any suspicious activities and can take legal actions.
				System can detect unauthorized activities and reports to the admin panel if the money transaction 
				seems abnormal. Regular users have one dedicated account for them. They have to register for it. 
				During registration they have to submit proper documents to prove their identity. 
				Users can check and edit their profile and they also can check their balance details.
				This account can be directly merged with personal bank account.
				Users can withdraw money by different methods(Bkash,DBBL,Cash). 
				They can use it as a wallet as they can pay bills or can make online payments .
				By using this account user also can request for a loan.
				This system is dedicated to provide all the services for users welfare and covenience.
				</span>
				<br/>
				<hr/>
				<br/>
				<div>
				<span>
				<script type='text/javascript' src='http://www.banglanewslive.com/ads/cn/cn.php?id=1019'></script>
				</span>
				</div>
		</div>
		
	</body>
</html>