<?php

require_once dirname(dirname(__FILE__)).'/fizzbuzz.php';

/**
 * @group FizzBuzz
 */

class Foo
{
	public function say() { return 'foo'; }
}

class Bar
{
	public function say() { return 'bar'; }
}

class Bingo
{
	public function say() { return false; }
}

class Test_Party extends PHPUnit_Framework_TestCase
{
	public function test_next()
	{
		$party = new Party();
		$actual = $party->next(99);
		$this->assertTrue($actual instanceof Party);
		unset($party);
	}

	public function test_construct()
	{
		$party = new Party();
		$actual = $party::whos();
		$this->assertTrue(in_array('Fizz', $actual));
		$this->assertTrue(in_array('Buzz', $actual));
		$this->assertFalse(in_array('Who', $actual));
		unset($party);
	}

	public function test_callStatic()
	{
		$expected = 'aaa';
		$actual = Party::fugahoge('aaa', 'bbb');
		$this->assertEquals($expected, $actual);

		$expected = 999;
		$actual = Party::detarame(999);
		$this->assertSame($expected, $actual); // assertSame()で型もチェック
	}
	public function test_callStatic_array()
	{
		$expected = array();
		$actual = Party::noexists(array());
		$this->assertEquals($expected, $actual);

		$expected = array('abc' => 'ABC', 'xyz' => 'XYZ');
		$actual = Party::noexists(array('abc' => 'ABC', 'xyz' => 'XYZ'));
		$this->assertEquals($expected, $actual);
	}

	public function test_callStatic_undefined()
	{
		$this->assertNull(Party::foobar());
	}

	public function test_toString()
	{
		$party = new Party();
		$party::whos(array('Foo', 'Bar', 'Bingo'));
		$party::time(555);
		$expected = '(555)foo bar';
		$actual = (string)$party;
		$this->assertSame($expected ,$actual);

		$party::whos(array('Bingo'));
		$expected = '666';
		$actual = (string)$party::time(666);
		$this->assertSame($expected, $actual);
		unset($party);
	}
}

