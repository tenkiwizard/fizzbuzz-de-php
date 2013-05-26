<?php
$drive = (isset($argv[1]) and ctype_digit($argv[1])) ? intval($argv[1]) : 100;

$party = new Party();
foreach (range(1, $drive) as $i) {
    echo $party->next($i).PHP_EOL;
}

class Party {
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
        $says = fizz::say().Buzz::say();
        return empty($says) ? (string)static::time() : $says;
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
