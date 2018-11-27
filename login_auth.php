<?php 
	//start the session
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log_in_auth</title>
	</head>
	<body>
		<?php 
			require("db_conn.php");
			//require("userAuthFile.php");
			
			if(sizeof($_POST) == 0) exit("Error!!!");
			$uname = $_POST["uname"];
			$password = $_POST["password"];
			
			/*
			$user_file = fopen("user_data.txt", "r") or die("Problem Opening User File");
			
			$found = false;
			
			while($data = fgets($user_file)){
				$data = trim($data);
				$data = explode(" ", $data);
				$_uname = $data[0];
				$_password = $data[1];
				
				if($_uname == $uname && $_password == md5($password)){
					$found = true;
					$_SESSION["uname"] = $_uname;
					header("location:login_successful.php");
				}
			}
			
			if(!$found){
				header("location:login.php");
				session_unset();
				session_destroy();
			}
			
			fclose($user_file);
			*/
			
			$query = "select * from login";
			$userData = getData($query);
			$adminData = getData("select * from admin");
			
			foreach($adminData as $data){  //login check for admins
				//print_r($data);
				if($data["user_name"] == $uname && md5($data["password"]) == md5($password)){
					$_SESSION["uname"] = $uname;
					header("location:admin_login.php");
					exit(0);
				}
			}
			
			/*
			echo "<pre ";
			print_r($userData);
			echo "pre/>";
			*/
		
			//$data = array();
			
			//$userData = getDataFromFile();
			
			//print_r($_temp);
			
			foreach($userData as $data){
				//print_r($data);
				if($data["uname"] == $uname && $data["password"] == md5($password)){
					$_SESSION["uname"] = $uname;
					header("location:login_successful.php");
					exit(0);
				}
			}
			
			header("location:login.php");
			session_unset();
			session_destroy();
			exit(0);
			
		?>
		
	</body>
</html>