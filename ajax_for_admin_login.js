function loadPage(btn,element_to_change){
	var xhttp;
	if(window.XMLHttpRequest){
		xhttp = new XMLHttpRequest();
	}
	else{
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			document.getElementById(element_to_change).innerHTML = this.responseText;
		}
	};
	
	xhttp.open("GET", btn + ".php", true);
	xhttp.send();
}

function getResult(){
				var xhttp;
				if(window.XMLHttpRequest){
					xhttp = new XMLHttpRequest();
				}
				else{
					xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xhttp.onreadystatechange = function() {
					if(this.readyState == 4 && this.status == 200){
						document.getElementById('query_result').innerHTML = this.responseText;
					}
				};
				
				xhttp.open("GET",  "admin_query_executor.php?query="+(document.getElementById('txtq').value).trim(), true);
				xhttp.send();
			}

function getRegistrationConf(conf, nid){
				var xhttp;
				if(window.XMLHttpRequest){
					xhttp = new XMLHttpRequest();
				}
				else{
					xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xhttp.onreadystatechange = function() {
					loadPage('registration_request', 'query_div');
				};
				
				xhttp.open("GET",  "registration_confirmation.php?conf="+conf+"&nid="+nid, true);
				xhttp.send();
			}