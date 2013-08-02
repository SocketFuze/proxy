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
	<table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"75%\">
		<tr bgcolor=\"#666666\">
			<td colspan=\"5\" align=\"center\"><b><font color=\"#FFFFFF\">" . $table[0] . "</font></td>
		</tr>
		<tr>
			<td>IP:Port</td>
			<td>Country Code</td>
			<td>Country Name</td>
			<td>Last Checked</td>
		</tr>";

	WHILE($rows = mysql_fetch_array($query)):
	
		$ip= $rows['ip'];
		$port= $rows['port'];
		$cCode= $rows['country_code'];
		$cName= $rows['country_name'];
		$date = $rows['date'];         
		
		echo "<tr>
		    <td>" . $ip .':'. $port . "</td>
		    <td>" . $cCode . "</td>
		    <td>" . $cName . "</td>
		    <td>" . $date . "</td>
		</tr>"; 	        
        
        endwhile;
        
        echo "</table><br/><br/>";
?>
