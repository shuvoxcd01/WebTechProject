<?php 
	session_start();
	if(!isset($_SESSION["uname"])){
		exit("Invalid Session");
	}
	
	require("db_conn.php");
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Withdraw</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		
		</script>
		
		<script>
		$f=true;
		$g=true;
		$(document).ready(function(){
			$("input").focus(function(){
				$(this).css("background-color","#ffcccc");
				
			});
			
			$("#withdraw_ammount").keypress(function(){
				if($f)
				{
					$(this).val("");
					$f=false;
					
				}
				
			});
			$("#withdraw_number").keypress(function(){
				if($g)
				{
					$(this).val("");
					$g=false;
					
				}
				
			});
			
		});
		</script>
		<script type="text/javascript">
		 function check()
		 {
			var flag=true;
			var _form = document.withdraw_form;
            var amount=document.getElementById("withdraw_ammount").value;
			var phnl=document.getElementById("withdraw_number").value.length;
			//document.getElementById("chk").innerHTML=phnl;
			if(amount<=0)
			{
				un = document.getElementById("withdrawSidemsg"); 
				un.innerHTML="amount less than or equal zero"; un.style="display:inline; color:red"; _form.w_amount.focus();
				return false;
			}
			else
			{
				document.getElementById("withdrawSidemsg").style="display:none";
			}
			if(isNaN(amount)) //is not number
			{   
		        un = document.getElementById("withdrawSidemsg"); 
				un.innerHTML="amount must be number"; un.style="display:inline; color:red"; _form.w_amount.focus();
				return false;
			}
			else
			{
				document.getElementById("withdrawSidemsg").style="display:none";
			}
			
			if(_form.w_amount.value.length == 0) {un = document.getElementById("withdrawSidemsg"); un.innerHTML="amount required"; un.style="display:inline; color:red"; _form.w_amount.focus(); return false;}
	        else
            { document.getElementById("withdrawSidemsg").style="display:none";}	
            
            if(phnl<10)
			{
				document.getElementById("numberSidemsg").innerHTML="Number must be 10 digit";
				un = document.getElementById("numberSidemsg");
				un.style="display:inline; color:red"; _form.number.focus();
				return false;
			}				
			
			 return flag;
			 
		 }
		
		</script>
	</head>
	
	<body>
			
		
		

		<div style="width:100%;height:1000px;background: linear-gradient(to bottom, #333300 0%, #999966 100%);color:white; text-align:left;  padding-right:400px">
			     
		<form action="withdraw_complete.php" method="post" name="withdraw_form">
		        
				Withdraw:<br/>
				<input type="text" name="w_amount" id="withdraw_ammount" value="Enter Amount to withdraw" >
				<span id="withdrawSidemsg"></span><br/>
				Withdraw via:<br/>
			   <input type="radio" name="via" value="BKASH" checked>BKASH
			    <br/>
			   <input type="radio" name="via" value="ROCKET">ROCKET
			    <br/>
				Withdraw Number:<br/>
				<input style="width:220px" type="text" name="number" id="withdraw_number" value="Enter your signed phone number ">
				<span id="numberSidemsg"></span>
				<br/>
				<input type="submit" value="Withdraw" onclick="return check()"><br/>
				
				<span id="chk"></span>
				
				
				
		</form>
		<form action="login_successful.php">
				<input type = "submit" value="Back">
		</form>	
		
		
		<form action="logout.php">
				<input type = "submit" value="Logout">
		</form>	
	    	
			
		</div>
			
					
		
	
		
	</body>
</html>