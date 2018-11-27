<!DOCTYPE html>
<html>
	<head>
		<title>userAuthFile</title>
	</head>
	<body>
		<?php 
		function getDataFromFile(){	
			$user_file = fopen("user_data.txt", "r") or die("Problem Opening User File");
			
			$arr = array();
			
			while($data = fgets($user_file)){
				$data = trim($data);
				$data = explode(" ", $data);
				$_uname = $data[0];
				$_password = $data[1];
				$temp = array();
				$temp["UserName"] = $_uname;
				$temp["Password"] = $_password;
				$arr[] = $temp;
			}
				
				
			fclose($user_file);
			
			return $arr;
		}
		?>
		
	</body>
</html>