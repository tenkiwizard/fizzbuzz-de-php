<?php

require_once dirname(__DIR__).'/classes/party.php';
require_once dirname(__DIR__).'/classes/who.php';

$times = (isset($argv[1]) and ctype_digit($argv[1])) ? intval($argv[1]) : 100;

$party = new Party();
foreach (range(1, $times) as $i)
{
	echo $party->next($i).PHP_EOL;
}
