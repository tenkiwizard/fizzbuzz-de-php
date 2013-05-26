<?php
$drive = (isset($argv[1]) and ctype_digit($argv[1])) ? intval($argv[1]) : 100;

$party = new Party();
foreach (range(1, $drive) as $i) {
    echo $party->next($i).PHP_EOL;
}

class Party {
    private static $events = array();

    public function __construct() {
        $omits = array('Who');
        foreach (get_declared_classes() as $class) {
            ! in_array($class, $omits)
                and method_exists($class, 'say')
                and static::$events[] = $class;
        }
    }

    public static function time($new = false) {
        static $time;
        $new and $time = $new;
        return $time;
    }

    public function next($time) {
        static::time($time);
        return $this;
    }

    public function __toString() {
        $says = array();
        foreach (static::$events as $event) {
            $say = $event::say();
            $say and $says[] = $say;
        }
        $time = (string)static::time();
        return empty($says)
            ? $time
            : sprintf( '(%d)%s', $time, implode(' ', $says));
    }
}

abstract class Who {
    protected static $Ihave;

    public static function say() {
        return (Party::time() % static::$Ihave) ? '' : get_called_class();
    }
}

class Fizz extends Who { protected static $Ihave = 3; }

class Buzz extends Who { protected static $Ihave = 5; }

class 前執行役員がシフト勤務をします extends Who {
    protected static $Ihave = 2;
}

class 河村がお休みをいただきます extends Who {
    public static function say() {
        return (gmp_prob_prime(Party::time())) ? get_called_class() : '';
    }
}
