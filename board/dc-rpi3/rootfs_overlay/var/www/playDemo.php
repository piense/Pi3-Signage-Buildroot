<?php

$bar = isset($_POST['file']) ? $_POST['file'] : null;

$request = "sudo /usr/bin/killall omxplayer";
exec($request);

$request = "sudo /usr/bin/killall pic_demo";
exec($request);

$request = "sudo /usr/bin/killall hello_font.bin";
exec($request);

$request = "sudo /usr/bin/pic_demo &> /dev/null &";
exec($request);

?>
