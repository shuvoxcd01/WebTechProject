
<?php 
	session_start();
	if(!isset($_SESSION["uname"])){
		exit("Invalid Session");
	}
	$_flag = true;
	//require("db_rw.php");
	require("db_conn.php");
	//echo "printing GLOBALS \r\n";
	//print_r($GLOBALS);

	$s=$_FILES['fileToUpload']['tmp_name'];
	$n=$_FILES['fileToUpload']['name'];
	//echo $_FILES['fileToUpload']['name']."<br>";
	//echo $_FILES['fileToUpload']['tmp_name']."<br>";

	$ar=explode("/",$_FILES['fileToUpload']['type']);
	//echo ($ar[0]);

	if($ar[0]!="image"){
		echo "Filetype not supported";
		$_flag = false;
	}
	else if(file_exists("uploads/".$n)){
		echo "Filename exists : ".$n;
		$_flag = false;
	}
	else{
		if(move_uploaded_file($s,"uploads/".$n)){
			$s="update user set photo_url='"."uploads/".$n."'where uname='".$_SESSION['uname']."'";
			echo $s;
			if(execQuery($s)){
				echo "Data Inserted into DB";
			}
			else{
				echo "DB Error!";
				$_flag = false;
			}
		}
		else{
			echo "File upload error";
			$_flag = false;
		}
		
	if(flag) header("location:profile.php?a=1");
}	
?>
</pre>