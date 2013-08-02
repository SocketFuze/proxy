<?php

require_once("ProxyChecker.php");
require_once("DatabaseDriver.php");

if(!isset($_POST)) exit(); //TODO change to post

$ipAddress = $_POST['ipaddresss'];
$ips = explode("\n", $ipAddress);
foreach($ips as $ip) {
	list($ip, $port) = explode(":", $ip);
	if(ProxyChecker::checkProxy($ip, $port)) {
		$loc = ProxyChecker::getLocation($ipAddress);
		$ipAddress = mysql_real_escape_string($ipAddress);
		$port = mysql_real_escape_string($port);

		$db = new DatabaseDriver("localhost", "socket_user", "1a2a3a4a", "socket_proxy");
		$db->insertProxy($ip, $port, $loc["countryCode"], $loc["countryName"]);
		echo "proxy inserted";
	} else {
		echo "Proxy Dead";
	}
}

?>

<!-- The form inputs needed -->

