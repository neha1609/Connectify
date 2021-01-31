<?php
	$command = escapeshellcmd('python3 C:/Users/user/Downloads/fetchingEmail.py');
    $output = shell_exec($command);
    echo $output;
    echo "end";
?>