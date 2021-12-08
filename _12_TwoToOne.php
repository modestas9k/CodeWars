<?php


use PHPUnit\Framework\TestCase;

//  Take 2 strings s1 and s2 including only letters from a to z . return a new
//  sorted string, the longest possible, containing distinct letters - each taken
//  only once - coming from s1 or s2 .

//    Examples:
//    a = "xyaabbbccccdefww"
//    b = "xxxxyyyyabklmopq"
//    longest(a, b)-> "abcdefklmopqwxy"
//
//    a = "abcdefghijklmnopqrstuvwxyz"
//    longest(a, a)-> "abcdefghijklmnopqrstuvwxyz"

function longest($a, $b)
{
    $one = $a . $b;
    $one = str_split($one, 1);
    $unique = array_unique($one);
    sort($unique);

    return implode('', $unique);
}

class _12_TwoToOne extends TestCase
{
    private function revTest($actual, $expected)
    {
        $this->assertEquals($expected, $actual);
    }

    public function testBasics()
    {
        $this->revTest(longest("aretheyhere", "yestheyarehere"), "aehrsty");
        $this->revTest(longest("loopingisfunbutdangerous", "lessdangerousthancoding"), "abcdefghilnoprstu");
        $this->revTest(longest("inmanylanguages", "theresapairoffunctions"), "acefghilmnoprstuy");
        $this->revTest(longest("lordsofthefallen", "gamekult"), "adefghklmnorstu");
    }
}
