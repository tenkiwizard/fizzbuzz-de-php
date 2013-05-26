<?php
$drive = (isset($argv[1]) and ctype_digit($argv[1])) ? intval($argv[1]) : 100;

$party = new Party();
foreach (range(1, $drive) as $i)
{
	echo $party->next($i).PHP_EOL;
}

class Party
{
	public function __construct()
	{
		$whos = array();
		foreach (get_declared_classes() as $class)
		{
			is_subclass_of($class, 'Who') and $whos[] = $class;
		}
		static::whos($whos);
	}

	public function next($time)
	{
		static::time($time);
		return $this;
	}

	public static function __callStatic($func, $args)
	{
		static $properties = array();
		$args and $properties[$func] = array_shift($args);
		return isset($properties[$func]) ? $properties[$func] : null;
	}

	public function __toString()
	{
		$says = array();
		foreach (static::whos() as $who)
		{
			$say = $who::say();
			$say and $says[] = $say;
		}
		$time = (string)static::time();
		return empty($says)
			? $time
			: sprintf('(%d)%s', $time, implode(' ', $says));
	}
}

abstract class Who
{
	protected static $Ihave;

	public static function say()
	{
		return (Party::time() % static::$Ihave) ? '' : get_called_class();
	}
}

class Fizz extends Who
{
	protected static $Ihave = 3;
	}

class Buzz extends Who
{
protected static $Ihave = 5;
}

class 前執行役員がシフト勤務をします extends Who
{
	protected static $Ihave = 2;
}

class 河村がお休みをいただきます extends Who
{
	public static function say()
	{
		return (gmp_prob_prime(Party::time())) ? get_called_class() : '';
	}
}

class 私こと本多が1日最低1回は自分コードをアップするのでレビューお願いします extends Who
{
	protected static $Ihave = 1;
}
