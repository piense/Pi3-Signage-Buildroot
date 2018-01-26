<html>
<head>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery-3.2.1.js"></script>
<script src="popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script language="javascript">
$(document).ready(function(){
	if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var SerReturn = xmlhttp.responseText;
			console.log(SerReturn);
			var serialPortInfo = JSON.parse(SerReturn);
			$("#TCPPort").val(serialPortInfo.port);
			$("#baudRate").val(serialPortInfo.baud);
		}
	}
	
	xmlhttp.open("GET", "getSerialConfig.php", true);
	xmlhttp.send();

});

function UpdateConfig(){
	// Fire off the request to /form.php
    request = $.ajax({
        url: "/updateSerialConfig.php",
        type: "post",
        data: {baud: $('#baudRate').val(), port: $('#TCPPort').val()}
    });
	
	    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		console.log(response);
        console.log("Hooray, it worked!");
    });
	
}

</script>
</head>

<?php
include 'navbar.php';
?>

<br>

<div class="row">

<div class="col-sm-3">
	<form>
	  <div class="form-group">
		<label><h5>Serial Port Settings</h5></label><br>
		<label>TCP Port #:</label>
		<input class="form-control" id="TCPPort" placeholder="TCP Port" value=""><br>
		<label>Baud Rate:</label>
		<input class="form-control" id="baudRate" placeholder="baud rate" value=""><br>
	  </div>
	</form>

<button type="button" class="btn btn-primary" onClick="UpdateConfig()">Save All</button>
</div>

</div>

</html>
