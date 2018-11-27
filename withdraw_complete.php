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
		<title>Withdraw_serverside</title>
	</head>
	
	<body>
	
		<?php
			
			
			$__info_valid = true;
			
			if(sizeof($_POST) == 0) exit("<h1>Error</h1>");
			//print_r($_POST);
			
			$keys = array_keys($_POST);  //return all the keys of a array
			
			//echo "<br/>".print_r($keys). "<br/>";
			//to find any empty text field 
			for($i=0; $i < sizeof($keys) ; $i++){
				if(strlen($_POST[$keys[$i]]) == 0){
					$__info_valid = false;
					echo $keys[$i]. " field is empty <br/>";
				//echo $_POST[$keys[$i]]. "  " . strlen($_POST[$keys[$i]])."<br/>";
				}
			}
			
			//check phone number
			if(strlen($_POST["number"]) < 10){
				$__info_valid  = false;
				echo "Phone number invalid  <br/>";
			}
			
			
			
			
			
			
			if($__info_valid){
			
				
				//print_r($_POST);
				//$uname = $_POST['uname'];
				//$query1 = "INSERT INTO user VALUES ('shuvo', null, null, null, null)";
				$amount=$_POST["w_amount"];
				$number=$_POST["number"];
				$type=$_POST["via"];
				//$bal_query = "select balance from user_account where"
				//$current_balance =
				//$q = "INSERT INTO user_account (balance) VALUES ('".$amount")
				$query1 = "select * from user";
				$userdata=getData($query1);
				//print_r($userdata);
				foreach($userdata as $data)
				{
					if($data["uname"]==$_SESSION["uname"])
					{
						$phonenumber=$data["phone"];
						$nid=$data["nid"];
					}
				}
				
			    if($phonenumber!=$number)
				{
					echo " Wrong phone number!!!";
					return false;
				}
				
				$query2="select * from user_account"; //to get balance
				
				$databalance=getData($query2);
				foreach($databalance as $data)
				{
					if($data["nid"]==$nid)
					{
					   $balance=$data["balance"];
					   $account_number=$data["acc_no"];
						
					}
				}
				
				if($amount>$balance)
				{
					echo "Not enough balance";
					return false;
					
					
				}
				
				$balance=$balance-$amount;
				//to do===================update the balance in usser_account
				
				$q="select * from balance";
				$udata=getData($q);
				$i=-1;
				foreach($udata as $data)
				{
					$i++;
				}
				echo $i;
				$i++;
				
				$query3="insert into balance (indx, acc_no, withdraw_amount, withdraw_date, withdraw_number, type) values ( '".$i."', '".$account_number."', '".$amount."', '". date("Y/m/d") ."', '".$number."', '".$type."' )";
				execQuery($query3);
				echo " successful.";
				header('location:withdrawn.php?amount='); //to do
			}
			
		?>    


	</body>
</html>