<?php

require_once dirname(dirname(__FILE__)).'/fizzbuzz.php';

/**
 * @group FizzBuzz
 */
class Test_Who extends PHPUnit_Framework_TestCase
{
	public function test_say()
	{
		Party::time(0);
		$this->assertEquals('Fizz', Fizz::say());
		Party::time(1);
		$this->assertFalse(Fizz::say());
		Party::time(2);
		$this->assertFalse(Fizz::say());
		Party::time(3);
		$this->assertEquals('Fizz', Fizz::say());
		Party::time(4);
		$this->assertFalse(Fizz::say());
		Party::time(5);
		$this->assertFalse(Fizz::say());
		Party::time(6);
		$this->assertEquals('Fizz', Fizz::say());
		Party::time(7);
		$this->assertFalse(Fizz::say());
	}
}
