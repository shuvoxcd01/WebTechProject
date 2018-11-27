<?php
	session_start();
	setcookie("uname",$_SESSION["uname"], time()- 10, "/" );
	setcookie("randval", "", time()- 10, "/");
?>

<! DOCTYPE html>
<html>
	<head>
		<title> logout </title>
	</head>
	
	<body>
		<?php
			session_unset();
			session_destroy();
			header("location:index.php");
			exit();
		?>
	</body>
</html>