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
		<title>Balance</title>
	</head>
	<body style="background: linear-gradient(to bottom, #333300 50%, #999966 100%);color:white;text-align:center;">
	    
		<?php
		    /*echo "<pre>";print_r($GLOBALS);echo "</pre>";
			 foreach($_GET as $k=>$v) //gets user's name
				 {
					 $name=$k;
				 }
			echo $name;	 */
			/*
			$balance_file = fopen("balance_data.txt", "r") or die("Problem Opening User File");
			
			$found = false;
			
			while($data = fgets($balance_file)){
				$data = trim($data);
				$data = explode(" ", $data);
				$_uname = $data[0];
				if($_uname==$_SESSION["uname"])
				{
					$_balance = $data[1];
					$_SESSION["balance"]=$_balance;
					
					//header("location:balance.php?$_balance");
					//break;
				}
				
				
					
				
			}
			*/
			
			$query = "select balance from user_account where acc_no = (select acc_tno from login where uname = '".$_SESSION["uname"]."')";
			$_arr = getData($query);
			//echo "balance" .$_balance. "TK" ;

        ?>
	
		<div style=" padding:70px 0px; text-align:centre">
				
				<?php
				 echo "<h1><i>Balance is: " .$_arr[0]['balance']. "</i></h1>";
				?>
				<hr/>
				
		</div>
			
			
						
		
		
	</body>

</html>
