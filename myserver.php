<!DOCTYPE html>

<html>
	<head>
		<title>Server Side Page</title>
	</head>
	
	<body>
	
		<?php
			require("db_conn.php");
			
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
			if(strlen($_POST["phone"]) < 10){
				$__info_valid  = false;
				echo "Phone number invalid  <br/>";
			}
			
			
			
			//check password match
			if($_POST["password"] != $_POST["password_confirm"]){
				$__info_valid = false;
				echo "Passwords don't match <br/>";
			}
			
			
			if($__info_valid){
				/*
				$user_file = fopen("user_data.txt","a") or die("Unable to open user_data.txt"); //a for "add"
				$user_detail = fopen("user_data_details.csv", "a") or die("Unable to open user_data_details");
				
				$__str = $_POST["uname"]." ".md5($_POST["password"])."\r\n";
				fwrite($user_file, $__str);
				
				unset($_POST["password"], $_POST["password_confirm"]); //remove the values
				$__str = implode(",", $_POST);
				$__str = $__str."\r\n";
				fwrite($user_detail, $__str);
				
				fclose($user_file);
				fclose($user_detail);
				*/
				
				//print_r($_POST);
				//$uname = $_POST['uname'];
				//$query1 = "INSERT INTO user VALUES ('shuvo', null, null, null, null)";
				$nid=$_POST['nid']; $dob=$_POST['dob'];
				$gender=$_POST['gender'];
				$balance=15000;
				$uname = $_POST['uname']; $firstName = $_POST['firstName'];
				$lastName = $_POST['lastName']; $phone = $_POST['phone'];
				$email = $_POST['email'];
				$password = md5($_POST["password"]);
				$accNo = mt_rand();
				$query1 = "insert into user (nid,uname, firstname, lastname, dob, phone, email, gender) VALUES ('".$nid."', '".$uname."', '".$firstName."', '".$lastName."', '".$dob."', '".$phone."', '".$email."' , '".$gender."' )";
				execQuery($query1);
				$query2 = "insert into login (nid, uname, password ) values ( '".$nid."', '".$uname."', '".$password."' )";
				execQuery($query2);
				$query3 = "insert into registration_req (nid, date_of_req) values ( '".$nid."', '". date("Y/m/d") ."' )";
				execQuery($query3);
				//echo "Sign up successful.";
				header('location:registration.php');
			}
			
		?>    


	</body>
</html>