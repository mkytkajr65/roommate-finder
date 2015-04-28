<?php
require_once 'core/init.php';
function getTabs()
{
	$db = DB::getInstance();

	$tabs = $db->query("SELECT * FROM tabs");
	$tabs = $tabs->results();

	foreach ($tabs as $tab)
	{
		echo '<li><div class="tabEntry">'. escapeName($tab->name) .'<span class="tabEntry_x">x</div></li>';
	}
}
?>