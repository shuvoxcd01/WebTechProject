
<!DOCTYPE html>
<head>
<title>Sign Up Form</title>
</head>

<script type="text/javascript">
	
	function check()
	{
		var flag = true;
		var _form = document.userDataForm;
		if(_form.uname.value.length == 0) {un = document.getElementById("unameSidemsg"); un.innerHTML="user name required"; un.style="display:inline; color:red"; _form.uname.focus(); return false;}
		else{document.getElementById("unameSidemsg").style="display:none";}
		if(_form.firstName.value.length == 0) {un = document.getElementById("firstNameSidemsg"); un.innerHTML="First name required";un.style="display:inline; color:red";_form.firstName.focus(); return false;}
		else{document.getElementById("firstNameSidemsg").style="display:none";}
		if(_form.lastName.value.length == 0) {un = document.getElementById("lastNameSidemsg"); un.innerHTML="Last name required";un.style="display:inline; color:red"; _form.lastName.focus(); return false;}
		else{document.getElementById("lastNameSidemsg").style="display:none";}
		if(_form.nid.value.length==0) {un=document.getElementById("NIDSidemsg"); un.innerHTML="NID required"; un.style="display:inline; color:red"; _form.nid.focus(); return false;}
		else{document.getElementById("NIDSidemsg").style="display:none";}
		if(_form.phone.value.length < 10){un = document.getElementById("phoneSidemsg"); un.innerHTML="phone number must be at least 10 digits long";un.style="color:red; display:inline"; _form.phone.focus(); return false;}
		else{document.getElementById("phoneSidemsg").style="display:none";}
		if(_form.email.value.indexOf("@") == -1){un = document.getElementById("emailSidemsg"); un.innerHTML="invalid e-mail address";un.style="color:red; display:inline"; _form.email.focus(); return false;}
		else{document.getElementById("emailSidemsg").style="display:none";}
		if(_form.dob.value.length == 0) {un = document.getElementById("dobSidemsg"); un.innerHTML="date of birth required ";un.style="display:inline; color:red"; _form.dob.focus(); return false;}
		else{document.getElementById("dobSidemsg").style="display:none";}
		if(_form.password.value.length == 0) {un = document.getElementById("passwordSidemsg"); un.innerHTML="Password required"; un.style="display:inline; color:red"; _form.password.focus(); return false;}
		else{document.getElementById("passwordSidemsg").style="display:none";}
		if(_form.password_confirm.value.length == 0) {un = document.getElementById("password_confirmSidemsg");un.style="display:inline; color:red"; un.innerHTML="Password confirmation required";_form.password_confirm.focus(); return false;}
		else{document.getElementById("password_confirmSidemsg").style="display:none";}
		if(_form.password.value != document.userDataForm.password_confirm.value) {un = document.getElementById("invPassSidemsg"); un.innerHTML="Passwords don't match";un.style="display:inline; color:red";_form.password.focus(); return false;}
		else{document.getElementById("invPassSidemsg").style="display:none";}
		//alert(error);
		//alert(document.userDataForm.uname.value.length);
		return flag;
	}
</script>	
	
<script>
	function showHint(str) {
		if (str.length == 0) { 
			document.getElementById("uname").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("unameSidemsg").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "uname_match_finder.php?uname=" + str, true);
			xmlhttp.send();
		}
	}
</script>



<body style="background: linear-gradient(to bottom, #333300 50%, #999966 100%); color:white;">
	
	<div>	
		<form action="myserver.php" method="post" name="userDataForm">
			<h1>Fill Up the Following Information</h1> 
			Choose a username <br/>
			<input type="text" name="uname" id = "uname" onkeyup="showHint(this.value)">
			<span id="unameSidemsg"></span>
			<br/>
			First Name <br/>
			<input type="text" name="firstName">
			<span id="firstNameSidemsg"></span>
			<br/>
			Last Name <br/>
			<input type="text" name="lastName">
			<span id="lastNameSidemsg"></span>
			<br/>
			NID<br/>
			<input type="text" name="nid">
			<span id="NIDSidemsg"></span>
			<br/>
			Phone<br/>
			<input type="text" name="phone">
			<span id="phoneSidemsg"></span>
			<br/>
			E-mail<br/>
			<input type="text" name="email">
			<span id="emailSidemsg"> </span>
			<br/>
			Date of Birth<br/>
			<input type=date name="dob" >
			<span id="dobSidemsg"></span>
			
			
			
			<br/>
			Gender
			<br/>
			<input type="radio" name="gender" value="male" checked>male
			<br/>
			<input type="radio" name="gender" value="female">female
			<br/>
			<input type="radio" name="gender" value="other">other
			<br/>
			Password <br/>
			<input type="password" name="password">
			<span id="passwordSidemsg"></span>
			<br/>
			Confirm password <br/>
			<input type = "password" name="password_confirm">
			<span id="password_confirmSidemsg"></span>
			<span id="invPassSidemsg"></span>
			<br/>
			<br/>
			<input type="submit" value="submit" onclick="return check()">
			<br/>
		</form>
        <form action="index.php" method="post">		
			<input type="submit" value="Back">
		</form>
	</div>

</body>