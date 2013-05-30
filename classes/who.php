<?php

abstract class Who
{
	protected static $i_have;

	public static function say()
	{
		return (Party::time() % static::$i_have) ? false : get_called_class();
	}
}

class Fizz extends Who
{
	protected static $i_have = 3;
}

class Buzz extends Who
{
	protected static $i_have = 5;
}

class 前執行役員がシフト勤務をします extends Who
{
	protected static $i_have = 2;
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
	protected static $i_have = 1;
}
