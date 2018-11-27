<?php 
	session_start();
	if(!isset($_SESSION["uname"])){
		exit("Invalid Session");
	}
	
	require("db_conn.php");
?>

<script type="text/javascript">
	function validate()
		{	
			flag=true;
			
			if(document.mfm.fileToUpload.value.length==0){
				alert("you must choose file to upload");
				flag=false;
			}
		
			return flag;
		}
</script>

<!DOCTYPE html>
<html>
	<head>
		<title>My_Profile</title>
	</head>
	
	<body>
		<?php	
		/*
			$user_detail = fopen("user_data_details.csv","r") or die("Unable to open user_data_details");
			fgetcsv($user_detail);
			$user_data = array();
			while($user_data = fgetcsv($user_detail)){
				$uname = trim($user_data[0]);
				if($uname == $_SESSION["uname"]){
					break;
				}
			}
			*/
			
			//require("db_conn.php");
			$query = "select uname, firstname, lastname, dob, gender, phone, email from user where uname = '".$_SESSION["uname"]."'";
			$user_data = getData($query);
			
			if(Isset($_GET["a"])==1)
			{
				echo"<p>Photo Uploaded Successfully!!!</p>";
				
			}
		?>	
		
		<form action="upload.php" method="post" enctype="multipart/form-data" name="mfm">
			<?php
			$query = "select photo_url from user where uname = '".$_SESSION["uname"]."'";
			$_arr = getData($query);
			echo '<img id="profile_picture" src="'.$_arr[0]['photo_url'].'" alt="profile_picture" height="200" width="150"/>'
			?>
			<br/>
			Select file to upload : <input type="file" name="fileToUpload"> <br/>
			<input type="submit" value="Upload File" onclick="return validate();" name="upload">
		</form>

		<div style="width:100%;height:1000px;background: linear-gradient(to bottom, #333300 0%, #999966 100%);color:white; text-align:left; padding:10px">
			     Username :<?php echo $user_data[0]['uname']; ?> <br/>
		   		 First Name : <?php echo $user_data[0]['firstname']; ?> <br/>
				 Last Name : <?php echo $user_data[0]['lastname']; ?> <br/>
				 Date of Birth:<?php echo $user_data[0]['dob']; ?> <br/>
			     Phone Number : <?php echo $user_data[0]['phone']; ?> <br/>
				 Email Address : <?php echo $user_data[0]['email']; ?> <br/>
		<form action="login_successful.php">
				<input type = "submit" value="Back">
		</form>
		<form action="logout.php">
				<input type = "submit" value="Logout">
		</form>				
			
		</div>
			
					
		
	
		<?php //fclose($user_detail); ?>
	</body>
</html>