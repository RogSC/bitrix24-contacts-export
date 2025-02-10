<?php

/**
 * Dump and die
 * @param mixed $var
 */
function dd($var = ''){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
	die();
}