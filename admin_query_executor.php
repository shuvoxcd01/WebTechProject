<?php
	
	$query = trim($_REQUEST['query']);
	
	$conn = mysqli_connect("localhost","root","","allowance2");
		
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	
	if(mysqli_num_rows($result)==0){mysqli_close($conn); echo "<span style=\"font-size: large;\"><b><i>Query executed successfully.</i></b></span>"; exit(0);}
	if($result == false){mysqli_close($conn); echo "Query Failed."; exit(0);}
	
	$arr = array();
	
	while($row = mysqli_fetch_assoc($result)){
		$arr[] = $row;
	}
	
	mysqli_close($conn);

	print "<pre>";
	print_r($arr);
	print "</pre>";
?>