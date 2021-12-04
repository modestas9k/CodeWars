<?php


use PHPUnit\Framework\TestCase;

function toJadenCase($string)
{
    return ucwords($string);
}

class JadenTestCases extends TestCase
{
    public function testJadenCase()
    {
        $str = "How can mirrors be real if our eyes aren't real";
        $this->assertEquals("How Can Mirrors Be Real If Our Eyes Aren't Real", toJadenCase($str));
    }
}
