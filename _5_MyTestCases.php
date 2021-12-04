<?php


use PHPUnit\Framework\TestCase;

function solve($s)
{
    $arrayOfLetters = str_split($s);
    $count = 0;

    foreach ($arrayOfLetters as $letter) {
        if (ctype_upper($letter)) {
            $count += 1;
        }
    }
    if ($count <= count($arrayOfLetters) / 2) {
        return strtolower($s);
    } else {
        return strtoupper($s);
    }
}

class MyTestCases extends TestCase
{
    public function testSampleTests()
    {
        $this->assertEquals("code", solve("code"));
        $this->assertEquals("CODE", solve("CODe"));
        $this->assertEquals("code", solve("COde"));
        $this->assertEquals("code", solve("Code"));
    }
}
