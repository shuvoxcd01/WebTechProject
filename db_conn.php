
<?php
	function getData($query)
	{
		$conn = mysqli_connect("localhost","root","","allowance2");
		
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		$arr = array();
		
		while($row = mysqli_fetch_assoc($result)){
			$arr[] = $row;
		}
		
		mysqli_close($conn);
		return $arr;
	}
	
	function execQuery($query)
	{
		$conn = mysqli_connect("localhost","root","","allowance2");
		
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		mysqli_close($conn);
		
		return $result;
	}
	
	function getJSONData($query)
	{
		$conn = mysqli_connect("localhost","root","","allowance2");
		
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		$arr = array();
		
		while($row = mysqli_fetch_assoc($result)){
			$arr[] = $row;
		}
		
		mysqli_close($conn);
		return json_encode($arr);
	}
	
?>