<?php

require_once dirname(__DIR__).'/classes/party.php';
require_once dirname(__DIR__).'/classes/who.php';

$times = (isset($_GET['times']) and ctype_digit($_GET['times'])) ? intval($_GET['times']) : 100;

$party = new Party();
foreach (range(1, $times) as $i)
{
	echo $party->next($i).'<br>'.PHP_EOL;
}
