<?php


use PHPUnit\Framework\TestCase;

//Write a function that takes an integer as input, and returns the number of bits that are equal to one in the binary representation of that number. You can guarantee that input is non-negative.
//
//Example: The binary representation of 1234 is 10011010010, so the function should return 5 in this case

function countBits($n)
{
    if ($n == 0) {
        return 0;
    }
    return ($n & 1) + countBits($n >> 1);
    
    // or
    // return substr_count(decbin($n), 1);
}

class _9_countBits extends TestCase
{
    public function testResultCountBits()
    {
        $this->assertEquals(countBits(0), 0);
        $this->assertEquals(countBits(4), 1);
        $this->assertEquals(countBits(7), 3);
        $this->assertEquals(countBits(9), 2);
        $this->assertEquals(countBits(10), 2);
    }
}
