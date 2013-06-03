<?php

require_once(dirname(__FILE__).'/functions.php');

function start_html($title, $heading) {
	echo "<!doctype html>\n";
	echo '<html>';
	echo '<head>';
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
	echo'<title>'.$title.'</title>';
	echo '</head><body>';
	echo '<h1>'.$heading.'</h1>';
}

function page_shut() {
	echo '</body></html>';
}

function do_battle($w, $b, $e) {
	return battle_sim($w, $b, $e);
}
