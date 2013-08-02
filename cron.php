<?php

require_once("ProxyChecker.php");
require_once("DatabaseDriver.php");

$db = new DatabaseDriver("localhost", "socket_user", "1a2a3a4a", "socket_proxy");
$results = $db->getProxies();

for($i = 0; $i < count($results); $i++) {
	$ip = $results[$i]['ip'];
	$port = $results[$i]['port'];
	$id = $results[$i]['id'];
	if(!ProxyChecker::checkProxy($ip, $port)) {
		$db->deleteProxy($id);
	}
}

?>

