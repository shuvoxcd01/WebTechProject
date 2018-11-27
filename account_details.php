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
		<title>Account_Details</title>
	</head>
	
	<body>
		<?php	
		    //to get nid
			$query1 = "select * from user";
				$userdata=getData($query1);
				//print_r($userdata);
				foreach($userdata as $data)
				{
					if($data["uname"]==$_SESSION["uname"])
					{
						$nid=$data["nid"];
					}
				}
			$query = "select * from user_account";
			$user_data = getData($query);
			foreach($user_data as $data)
				{
					if($data["nid"]==$nid)
					{
						$accno=$data["acc_no"];
						$balance=$data["balance"];
					}
				}
				
		    //print_r($accno);	
		?>	
		
		
	
		<div style="width:100%;height:1000px;background: linear-gradient(to bottom, #333300 0%, #999966 100%);color:white; text-align:center">
			
				 <b style="font-size:150%">Account No :<?php echo $accno; ?> </b><br/>
		   		 <b style="font-size:150%">Balance : <?php  echo $balance; ?> </b><br/>
					
		<form action="login_successful.php">
				<input style="font-size:150%" type = "submit" value="Back">
		</form>
		<form action="logout.php">
				<input style="font-size:150%" type = "submit" value="Logout">
		</form>
		</div>
		
	</body>
</html>