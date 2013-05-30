<?php

require_once dirname(dirname(__FILE__)).'/fizzbuzz.php';

/**
 * @group FizzBuzz
 */
class test_河村がお休みをいただきます extends PHPUnit_Framework_TestCase
{
	public function test_say()
	{
		Party::time(0);
		$this->assertFalse(河村がお休みをいただきます::say());
		Party::time(1);
		$this->assertFalse(河村がお休みをいただきます::say());
		Party::time(2);
        $this->assertEquals('河村がお休みをいただきます', 河村がお休みをいただきます::say());
		Party::time(3);
        $this->assertEquals('河村がお休みをいただきます', 河村がお休みをいただきます::say());
        // ... PHP\gmp_prob_prime()のテストをするわけではないのでこんなもんでよかろ
        
	}
}
