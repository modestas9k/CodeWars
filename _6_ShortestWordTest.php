<?php


use PHPUnit\Framework\TestCase;

function findShort($str): int
{
    $array = explode(' ', $str);
    $winner = 0;
    foreach ($array as $word) {
        if ($winner > strlen($word) || $winner === 0) {
            $winner = strlen($word);
        }
    }
    return $winner;
}

// or
//function findShort($str){
//   return min(array_map('strlen', (explode(' ', $str))));
//}

class ShortestWordTest extends TestCase
{
    public function testBasics()
    {
        $this->assertEquals(3, findShort("bitcoin take over the world maybe who knows perhaps"));
        $this->assertEquals(3, findShort("turns out random test cases are easier than writing out basic ones"));
        $this->assertEquals(2, findShort("Let's travel abroad shall we"));
    }
}
