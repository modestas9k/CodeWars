<?php


use PHPUnit\Framework\TestCase;

//    Examples:
//    s="aaabbbbhaijjjm"
//    printer_error(s) => "0/14"
//
//    s="aaaxbbbbyyhwawiwjjjwwm"
//    printer_error(s) => "8/22"


function printerError($s)
{
    $total = strlen($s);
    $goodOnes = preg_match_all('/[a-m]/i', $s);

    if ($goodOnes <= $total) {
        return $total - $goodOnes . '/' . $total;
    }
}

class _13_PrinterErrors extends TestCase
{
    private function revTest($actual, $expected)
    {
        $this->assertEquals($expected, $actual);
    }

    public function testBasics()
    {
        $s = "aaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyz";
        $this->revTest(printerError($s), "3/56");
        $s = "kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyz";
        $this->revTest(printerError($s), "6/60");
        $s = "kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyzuuuuu";
        $this->revTest(printerError($s), "11/65");
    }
}
