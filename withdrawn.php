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
		<title>Withdrawn</title>
		
	</head>
	
	<body style="background: linear-gradient(to bottom, #333300 50%, #999966 100%);color:white;text-align:center;">
		
		
	
		<div style=" padding:70px 0px; float:center">
			
			
			
			<?php
			 echo "<h1><i>Successfully Withdrawn</i></h1>";
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
			 $query2="select * from user_account"; //to get balance
				
				$databalance=getData($query2);
				foreach($databalance as $data)
				{
					if($data["nid"]==$nid)
					{
					   $balance=$data["balance"];
					   //$account_number=$data["acc_no"];
						
					}
				}
				$amount=$_GET["amount"];
				
			?>
			<hr/>
			
			
			<div style="float:center">
			  <p style="font-size:150%">New Balance:<?php echo $balance; ?></p>
				<form action="withdraw.php">
					<input type = "submit" value="Back">
				</form>
			</div>	
			
			
		
	</body>
</html>