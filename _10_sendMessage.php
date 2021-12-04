<?php

use PHPUnit\Framework\TestCase;

//-------------------------
//|   1   |   2  |  3  |  <--hold a key to type a number
//|  .,?! |  abc | def |  <--press a key to type a letter
//-------------------------
//|   4 |  5  |  6  |  <--Top row
//| ghi | jkl | mno |  <--Bottom row
//-------------------------
//|   7   |  8  |  9   |
//|  pqrs | tuv | wxyz |
//-------------------------
//|   *   |   0 |   #   |  <-- hold for *, 0 or #
//|  '-+= | space |  case |  <-- press # to switch between upper/lower case
//-------------------------

function sendMessage($message, $isUpper = false)
{
    $messageLetters = str_split($message);
    $codex = array(
        '0-' => '0',
        '1-' => '1',
        '2-' => '2',
        '3-' => '3',
        '4-' => '4',
        '5-' => '5',
        '6-' => '6',
        '7-' => '7',
        '8-' => '8',
        '9-' => '9',
        '0' => ' ',
        '*-' => '*',
        '*' => "'",
        '**' => '-',
        '***' => '+',
        '****' => '=',
        '#-' => '#',
        '1' => '.',
        '11' => ',',
        '111' => '?',
        '1111' => '!',
        '2' => 'a',
        '22' => 'b',
        '222' => 'c',
        '3' => 'd',
        '33' => 'e',
        '333' => 'f',
        '4' => 'g',
        '44' => 'h',
        '444' => 'i',
        '5' => 'j',
        '55' => 'k',
        '555' => 'l',
        '6' => 'm',
        '66' => 'n',
        '666' => 'o',
        '7' => 'p',
        '77' => 'q',
        '777' => 'r',
        '7777' => 's',
        '8' => 't',
        '88' => 'u',
        '888' => 'v',
        '9' => 'w',
        '99' => 'x',
        '999' => 'y',
        '9999' => 'z',
    );

    $codexString = '';

    foreach ($messageLetters as $letter) {
        $codexLetterKey = array_search($letter, $codex);
        $string = $codexLetterKey;

        $ifUpper = $isUpper;
        $ifSameCharAsBefore = substr($codexString, -1) === substr($codexLetterKey, 1, 1);
        $ifCurrentIsUpper = ctype_upper($letter);
        $charBefore = substr($codexString, -1);
        $ifCurrentIsStar = substr($codexLetterKey, 1, 1) === '*';

        if (is_numeric($charBefore) && $ifSameCharAsBefore && $isUpper === false && $ifCurrentIsUpper === false) {
            $string = ' ' . $string;

        } elseif ($isUpper === false && $ifCurrentIsUpper && $ifCurrentIsStar === false) {
            $string = '#' . array_search(strtolower($letter), $codex);
            $ifUpper = true;

        } elseif ($isUpper == true && !$ifCurrentIsUpper && $ifSameCharAsBefore && !$ifCurrentIsStar) {
            $string = '#' . $string;
            $ifUpper = false;
        } elseif ($isUpper == true && !$ifCurrentIsUpper && is_numeric($charBefore) && !$ifCurrentIsStar) {
            $string = '#' . $string;
            $ifUpper = false;
        } elseif ($isUpper == true && !$ifCurrentIsUpper && !$ifCurrentIsStar) {
            $string = '#' . $string;
            $ifUpper = false;
        }

        $isUpper = $ifUpper;
        $codexString .= $string;
    }
    echo "<pre>";
    print_r($codexString);
    echo "</pre>";

    return $codexString;
}

class _10_sendMessage extends TestCase
{
    public function testSampleTests()
    {
        $this->assertEquals("4433999", sendMessage("hey"));
        $this->assertEquals("666 6633089666084477733 33", sendMessage("one two three"));
        $this->assertEquals("#44#33555 5556660#9#66677755531111", sendMessage("Hello World!"));
        $this->assertEquals("#3#33 3330#222#666 6601-1111", sendMessage("Def Con 1!"));
        $this->assertEquals("#2**#9999", sendMessage("A-z"));
        $this->assertEquals("1-9-8-4-", sendMessage("1984"));
        $this->assertEquals("#22#444 4084426655777703336667770222443322255444664066688 806999055282", sendMessage("Big thanks for checking out my kata"));
    }
}
