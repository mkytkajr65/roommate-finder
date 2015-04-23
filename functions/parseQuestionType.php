<?php
require_once '../core/alt_init.php';
function parseQuestion($q)
{
	$rv = explode("_", $q);
	return $rv;
}

?>