<?php
	require('db_conn.php');
	$query = "select * from registration_req";
	//echo $query;
	$res = getData($query);
	if(sizeof($res) == 0){
		echo "<b><i>No request pending</b></i>";
		exit(0);
	}
	
	echo"
	<table>
	  <tr>
		<th>NID</th>
		<th>Date of request</th> 
		<th>Confirmation</th>
	  </tr>";
	  
	  foreach($res as $a0){
		  echo"
		  <tr>
			<td>".$a0['nid']."</td>
			<td>".$a0['date_of_req']."</td> 
			<td><button type=button onclick='getRegistrationConf(\"true\",".$a0['nid'].")'>Confirm</button><button type=button onclick='getRegistrationConf(\"false\",".$a0['nid'].")'>Delete</button></td>
		  </tr>";
	  }
	  
	echo"</table>";
	echo"
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {background-color:#111111;}
	</style>
	"
	/*
	foreach($res as $a0_key=>$a0_value){
		echo $a0_key."    ";
		foreach($a0_value as $a1_key => $a1_value){
			echo $a1_key."  ".$a1_value;
		}
		echo "\n\r";
	}
	*/
	
	/*
	print "<pre>";
	print_r($res);
	print "</pre>";
	*/
?>