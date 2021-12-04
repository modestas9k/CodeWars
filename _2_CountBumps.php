<?php


use PHPUnit\Framework\TestCase;

function bump($string)
{
    return (substr_count($string, 'n') > 15) ? 'Car Dead' : 'Woohoo!';

//    $arrayOfLetters = str_split($string);
//    $count = 0;
//    foreach ($arrayOfLetters as $letter) {
//        if ($letter === 'n') {
//            $count += 1;
//        }
//    }
//    return $count >= 15 ? 'Car Dead' : 'Woohoo!';
}

class CountBumps extends TestCase
{
    public function testSampleTests()
    {
        $this->assertEquals(bump("n"), "Woohoo!");
        $this->assertEquals(bump("_nnnnnnn_n__n______nn__nn_nnn"), "Car Dead");
        $this->assertEquals(bump("______n___n_"), "Woohoo!");
        $this->assertEquals(bump("nnnnnnnnnnnnnnnnnnnnn"), "Car Dead");
    }
}
