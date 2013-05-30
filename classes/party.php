<?php

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

		return empty($says)
			? string(static::time())
			: sprintf('(%d)%s', static::time(), implode(' ', $says));
	}
}
