<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Disable Compatability Mode in IE9 -->
<meta http-equiv="X-UA-Compatible" content="IE=9" >
<title>Tweets</title>
<link href="css/layout.css" rel="stylesheet" type="text/css">
<!-- Fix for IE 6 and 7 displaying margins in wrong place -->
<!--[if lt IE 8 ]> <link href="css/ie.css" rel="stylesheet" type="text/css"> <![endif]-->

<!-- Fix for IE9 using Helvetica -->
<!--[if IE 9]> <link href="css/ie9.css" rel="stylesheet" type="text/css"> <![endif]-->
<script type="text/javascript">
	var x = 0;
	
	// Setup the intial 5 (or more if you want!)
	function initial(){
		for (var a=0; a<5; a++){
			x++;
			var message = document.createElement("div");
			message.className = "message";
			message.id = "m"+x;
			message.innerHTML = '<img src="'+image+'" alt="'+username+'"/>'+tweets[x];
			var messages = document.getElementById("messages");
			messages.appendChild(message);
		}
		// Add the first marker to the first message
		document.getElementById('m1').className += ' first';
		// Add the last marker to the last message
		document.getElementById('m'+x).className += ' last';
	}
	
	function more(){
		// Remove the last marker from the previously last message
		document.getElementById('m'+x).className = "message";

		// Load next 5 messages
		for (var a=0; a<5; a++){
			x++;
			var message = document.createElement("div");
			message.className = "message";
			message.id = "m"+x;
			message.innerHTML = '<img src="'+image+'" alt="'+username+'"/>'+tweets[x];
			var messages = document.getElementById("messages");
			messages.appendChild(message);
		}
		
		// Add the last marker to the last message
		document.getElementById('m'+x).className += ' last';
	}
</script>
</head>
<body onload="initial()">
	<div id="holder">
		<div id="floater"></div>
		<div id="content">
			<div id="head"></div>
            <div id="headTitle">Tweets</div>
            <div id="messages">
            </div>
            <div id="more"><a href="#more" onclick="more();">More</a></div>
		</div>
	</div>
    <a name="more"></a>
</body>
</html>
<script type="text/javascript">
<?php include("actions.php"); ?>
</script>
