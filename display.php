<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	   
	<title>SocketFuze - Proxy Solution</title>
	
	<!-- Styles -->
	<link rel="stylesheet" href="css/proxy.css">
	
	<!-- Base JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<script src="js/simplejax.js" type="text/javascript"></script>
	<script src="js/tinysort.js" type="text/javascript"></script>
	<script src="js/proxy.js" type="text/javascript"></script>
</head>

<body>

<?php

//connection variables
$host = "localhost";
$database = "socket_proxy";
$user = "socket_user";
$pass = "1a2a3a4a";

//connect to the server
$link = mysql_connect($host, $user, $pass); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
}

//connect to the database
mysql_select_db($database); 

//query the database
$query = mysql_query("SELECT * FROM proxies");

// Display Table

	echo "
	<table id=\"listtable\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"75%\" rel=\"50\">
		<thead>
		<tr id=\"theader\">
			<td>IP Address</td>
			<td>Port</td>
			<td>Country</td>
			<td>Type</td>
			<td>Anonymity</td>
			<td>Last Checked</td>
		</tr>
		</thead>";

	WHILE($rows = mysql_fetch_array($query)):
	
		$ip= $rows['ip'];
		$port= $rows['port'];
		$cCode= $rows['country_code'];
		$cName= $rows['country_name'];
		$date = $rows['date'];
		
		$flag = strtolower($cCode);
		
		echo "<tr class=\"\"  rel=\"13351271\">
		    <td>" . $ip . "</td>
		    <td>" . $port . "</td>
		    <td>" . '<img src="http://static.hidemyass.com/flags/'.$flag.'.png" alt="flag" />' . $cName . "</td>
		    <td>" . 'Type' . "</td>
		    <td>" . 'Anonymity' . "</td>
		    <td>" . $date . "</td>
		</tr>";
        
        endwhile;
        
        echo "</table><br/><br/>";
?>

</body>
</html>
