<?php

include 'getNetworkStatus.php';

if($network['wlan0IP'] == "x.x.x.x"){
	echo ("Restarting wlan0");
	exec("sudo /usr/bin/killall wpa_supplicant");
	exec("sudo /sbin/ifdown -f wlan0");
	exec("sudo /sbin/ifup wlan0");
}

?>