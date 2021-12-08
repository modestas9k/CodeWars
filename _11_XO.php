<?php


use PHPUnit\Framework\TestCase;

//  XO("ooxx") => true
//  XO("xooxx") => false
//  XO("ooxXm") => true
//  XO("zpzpzpp") => true // when no 'x' and 'o' is present should return true
//  XO("zzoo") => false

function XO($s)
{
    return substr_count(strtolower($s), "x") === substr_count(strtolower($s), 'o');
}

class _11_XO extends TestCase
{
    public function testSampleTests()
    {
        $this->assertEquals(true, XO('xo'));
        $this->assertEquals(true, XO('XO'));
        $this->assertEquals(true, XO('xo0'));
        $this->assertEquals(false, XO('xxxoo'));
        $this->assertEquals(true, XO("xxOo"));
    }
}
