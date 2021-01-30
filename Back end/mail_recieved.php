<?php
require_once("vendor/autoload.php"); 
//require_once __DIR__.'/SimpleXLSX.php';
	if ( $xlsx = SimpleXLSX::parse('jul_tweet.xlsx') ) {
	echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
	foreach( $xlsx->rows() as $r ) {
		echo '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';
	}
	echo '</table>';
	// or $xlsx->toHTML();	
	} else {
		echo SimpleXLSX::parseError();
	}
?>