<?php
	require('db_conn.php');
	$query = "select * from user";
	//echo $query;
	$res = getJSONData($query);
	$res = json_decode($res);
	if(sizeof($res) == 0){
		echo "<b><i>No user to show</b></i>";
		exit(0);
	}
	
	echo"
	<table>
	  <tr>
		<th>NID</th>
		<th>Username</th> 
		<th>First Name</th>
		<th>Last Name</th>
		<th>Date of Birth</th> 
		<th>Phone</th>
		<th>E-mail</th>
		<th>Gender</th> 
		<th>Photo url </th>
		<th>Validity</th>
	  </tr>";
	  
	  foreach($res as $a0){
		  echo"
		  <tr>
			<td>".$a0->nid."</td>
			<td>".$a0->uname."</td> 
			<td>".$a0->firstname."</td>
			<td>".$a0->lastname."</td> 
			<td>".$a0->dob."</td>
			<td>".$a0->phone."</td> 
			<td>".$a0->email."</td>
			<td>".$a0->gender."</td> 
			<td>".$a0->photo_url."</td>
			<td>".$a0->validity."</td> 
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