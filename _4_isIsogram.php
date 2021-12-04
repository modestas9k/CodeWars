<?php


use PHPUnit\Framework\TestCase;

//An isogram is a word that has no repeating letters, consecutive or
//non - consecutive . Implement a function that determines whether a string
//that contains only letters is an isogram . Assume the empty string is an isogram .
//Ignore letter case.
//
//"Dermatoglyphics"-- > true
//"aba"-- > false
//"moOse"-- > false(ignore letter casing)

function isIsogram($string)
{
    $uniqueLetters = [];
    $arrayOfLetters = str_split(strtolower($string));

    foreach ($arrayOfLetters as $letter) {

        if (in_array($letter, $uniqueLetters)) {
            return false;
        } else {
            $uniqueLetters[] = $letter;
        }
    }
    return true;
}

class IsIsogram extends TestCase

{
    public function testSampleTests()
    {
        $this->assertEquals(true, isIsogram("Dermatoglyphics"));
        $this->assertEquals(true, isIsogram("isogram"));
        $this->assertEquals(false, isIsogram("aba"), "same chars may not be adjacent");
        $this->assertEquals(false, isIsogram("moOse"), "same chars may not be same case");
        $this->assertEquals(false, isIsogram("isIsogram"));
        $this->assertEquals(true, isIsogram(""), "an empty string is a valid isogram");
    }
}
