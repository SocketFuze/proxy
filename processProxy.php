<?php

require_once("ProxyChecker.php");
require_once("DatabaseDriver.php");

if(!isset($_POST)) exit(); //TODO change to post

$ipAddress = $_POST['ipaddress'];
echo nl2br($ipAddress);
$ips = explode("\n", trim($ipAddress));
echo "Vardump on ips\n";
print_r($ips);
foreach($ips as $ip) {
	echo "in forloop for ip: {$ip} \n";
	$tmp = explode(":", $ip);
	$ip = trim($tmp[0]);
	$port = trim($tmp[1]);
	if(ProxyChecker::checkProxy($ip, $port)) {
		$loc = ProxyChecker::getLocation($ipAddress); 
		print_r($loc);
		$ipAddress = mysql_escape_string($ipAddress); //FIXME: Update to MySQLi
		$port = mysql_escape_string($port);

		$db = new DatabaseDriver("localhost", "socket_user", "1a2a3a4a", "socket_proxy");
		if(!$db->checkDuplicate($ip, $port)) {
			$db->insertProxy($ip, $port, $loc["countryCode"], $loc["countryName"]);
			echo "proxy inserted";
		} else {
			echo "Duplicate ip and port found in the database";
		}
	} else {
		echo "Proxy Dead: {$ip}";
	}
}

?>

<!-- The form inputs needed -->

