<!DOCTYPE html>
<html>
	<head>
		<title>Log_in_auth</title>
	</head>
	<body>
		<?php 
		    
			$uname = $_POST["uname"];
			$password = $_POST["password"];
			echo "check";
			$user_file = fopen("user_data.txt", "r") or die("Problem Opening User File");
			print_r($user_file);
			$found = false;
			
			while($data = fgets($user_file)){
				$data = trim($data);
				$data = explode(" ", $data);
				$_uname = $data[0];
				$_password = $data[1];
				
				if($_uname == $uname && $_password == $password){
					$found = true;
					echo "check from if";
					header("location:login_successful.php");
					exit();
				}
			}
			
			if(!$found){
				header("location:login.php");
				exit();
			}
			
		?>
		
	</body>
</html>