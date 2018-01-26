<?php

$files['files'] = scandir("/mnt/data/media");
unset($files['files'][0]);
unset($files['files'][1]);
$files['files']=array_values($files['files']);
echo json_encode($files);

?>