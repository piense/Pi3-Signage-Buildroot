<?php

//inserting post data directly into an exec is a very bad idea, meh

$baud = isset($_POST['baud']) ? $_POST['baud'] : null;
$port = isset($_POST['port']) ? $_POST['port'] : null;

$request = "sudo /bin/rm /mnt/data/config/ser2net.conf";
exec($request);

$request = "sudo /bin/touch /mnt/data/config/ser2net.conf";
exec($request);

$request = "sudo /bin/chmod 777 /mnt/data/config/ser2net.conf ";
exec($request);

$request = "/bin/echo '".$port.":raw:600:/dev/ttyUSB0:".$baud." NONE 1STOPBIT 8DATABITS NONE' > /mnt/data/config/ser2net.conf &";
exec($request);

$request = "sudo /bin/chmod 744 /mnt/data/config/ser2net.conf ";
exec($request);

$request = "sudo /etc/init.d/S50ser2net stop";
exec($request);

sleep(3);

$request = "sudo /etc/init.d/S50ser2net start";
exec($request);

?>

