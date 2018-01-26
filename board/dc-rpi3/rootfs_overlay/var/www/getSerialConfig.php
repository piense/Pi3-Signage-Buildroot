<?php

//TODO: Check for data count and parity

$match = array();
$handle = fopen("/mnt/data/config/ser2net.conf", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
		if(preg_match("/^([0-9]{1,6}):raw:[0-9]{1,4}:([\/a-zA-Z0-9]*):([0-9]{1,8})/",$line,$match) == 1){
			break;
		}
    }

    fclose($handle);
} else {
    // error opening the file.
} 

$serialConfig['port'] = $match[1];
$serialConfig['device'] = $match[2];
$serialConfig['baud'] = $match[3];

echo json_encode($serialConfig);

?>
