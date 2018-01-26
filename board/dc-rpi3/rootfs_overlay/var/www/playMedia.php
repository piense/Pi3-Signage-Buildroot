<?php

$bar = isset($_POST['file']) ? $_POST['file'] : null;

$request = "sudo /usr/bin/killall omxplayer";
exec($request);

$request = "sudo /usr/bin/omxplayer --no-osd /mnt/data/media/".$bar." &> /dev/null &";
exec($request);

?>
