function loadPage(btn){
	var xhttp;
	if(window.XMLHttpRequest){
		xhttp = new XMLHttpRequest();
	}
	else{
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			document.getElementById('sideDiv').innerHTML = this.responseText;
		}
	};
	
	xhttp.open("GET", btn + ".php", true);
	xhttp.send();
}