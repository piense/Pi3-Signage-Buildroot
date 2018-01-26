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
			var ret = JSON.parse(SerReturn);
			for(var i =0;i<ret['files'].length;i++)
			{
				$("#mediaItems").append("<option value='"+ret['files'][i]+"'>"+ret['files'][i]+"</option>")
			}
		}
	}
	
	xmlhttp.open("GET", "getMedia.php", true);
	xmlhttp.send();

});

function playMedia(){
	// Fire off the request to /form.php
    request = $.ajax({
        url: "/playMedia.php",
        type: "post",
        data: {file: $('#mediaItems :selected').text()}
    });
	
	    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		console.log(response);
        console.log("Hooray, it worked!");
    });
}

function playDemo(){
	// Fire off the request to /form.php
    request = $.ajax({
        url: "/playDemo.php",
        type: "post",
        data: {}
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

<?php include 'navbar.php'; ?><br>

<div class="col-sm-3">

<select id="mediaItems">
</select><br><br>		

<button type="button" class="btn btn-primary" onClick="playMedia();">Play Content</button>
<button type="button" class="btn btn-primary" onClick="playDemo();">Play Demo</button>
</div>

</html>
