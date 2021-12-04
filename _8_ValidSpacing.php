<?php

//Your task is to write a function called valid_spacing() or validSpacing() which checks if a string has valid spacing. The function should return either True or False.
//
//For this kata, the definition of valid spacing is one space between words, and no leading or trailing spaces. Below are some examples of what the function should return.
//
//'Hello world' = true
//' Hello world' = false
//'Hello world  ' = false
//'Hello  world' = false
//'Hello' = true
// Even though there are no spaces, it is still valid because none are needed
//'Helloworld' = true
// true because we are not checking for the validity of words.
//'Helloworld ' = false
//' ' = false
//'' = true

use PHPUnit\Framework\TestCase;

function valid_spacing($s)
{
    $newStr = trim(preg_replace('/\s+/', " ", $s));

    echo "<pre>";
    print_r($newStr);
    echo "</pre>";

    return $newStr == $s;
}

class ValidSpacing extends TestCase
{
    public function testSample()
    {
        $this->assertEquals(true, valid_spacing("Hello korld"));
        $this->assertEquals(false, valid_spacing("Hello  world"));
        $this->assertEquals(false, valid_spacing(" Hello world"));
        $this->assertEquals(false, valid_spacing("Hello world "));
        $this->assertEquals(true, valid_spacing("Hello"));
        $this->assertEquals(true, valid_spacing("Helloworld"));
    }
}
