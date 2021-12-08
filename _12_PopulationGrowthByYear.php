<?php


use PHPUnit\Framework\TestCase;

function nbYear($p0, $percent, $aug, $p)
{
    $percent = $percent / 100;
    $years = $p0;

    for ($count = 0; $years < $p; $count++) { // did not get points, had '<=' instead '<'...
        $years = intval($years + $years * $percent + $aug);
        echo $years . 'stop';
    }
    return $count;
}

class _12_PopulationGrowthByYear extends TestCase
{
    private function revTest($actual, $expected)
    {
        $this->assertEquals($expected, $actual);
    }

    public function testBasics()
    {
        $this->revTest(nbYear(1500, 5, 100, 5000), 15);
        $this->revTest(nbYear(1500000, 2.5, 10000, 2000000), 10);
    }
}
