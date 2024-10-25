<?php
$txt =$sql."\n";
$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);




file_put_contents('logs.txt', print_r($parameters, true));
?>