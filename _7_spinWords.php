<?php


use PHPUnit\Framework\TestCase;

//Write a function that takes in a string of one or more words, and returns the same string, but with all five or more letter words reversed(Just like the name of this Kata). Strings passed in will consist of only letters and spaces . Spaces will be included only when more than one word is present .
//
//Examples: spinWords("Hey fellow warriors") => returns "Hey wollef sroirraw" spinWords("This is a test") => returns "This is a test" spinWords("This is another test")=> returns "This is rehtona test"

function spinWords(string $str): string
{
    $arrayOfWords = explode(' ', $str);

    $a = array_map(function ($word) {
        return (strlen($word) >= 5) ? strrev($word) : $word;
    }, $arrayOfWords);

//    echo "<pre>";
//    print_r($a);
//    echo "</pre>";

    return join(' ', $a);
}

class SpinWords extends TestCase
{
    public function testBasicTests()
    {
        $this->assertEquals("emocleW", spinWords("Welcome"));
        $this->assertEquals("Hey wollef sroirraw", spinWords("Hey fellow warriors"));
        $this->assertEquals("This is a test", spinWords("This is a test"));
        $this->assertEquals("This is rehtona test", spinWords("This is another test"));
        $this->assertEquals("You are tsomla to the last test", spinWords("You are almost to the last test"));
        $this->assertEquals("Just gniddik ereht is llits one more", spinWords("Just kidding there is still one more"));
        $this->assertEquals("ylsuoireS this is the last one", spinWords("Seriously this is the last one"));
    }
}
