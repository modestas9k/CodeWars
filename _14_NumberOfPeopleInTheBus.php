<?php


use PHPUnit\Framework\TestCase;

//    array
//    (
//        [0] => array
//        (
//            [0] => 'num of get into bus',
//            [1] => 'num of people get off'
//        )
//    )

function number($bus_stops)
{
    $totalLeft = 0;
    foreach ($bus_stops as $stop) {
        $totalLeft = $totalLeft + $stop[0] - $stop[1];
    }
    return $totalLeft;
}

class _14_NumberOfPeopleInTheBus extends TestCase
{
    public function testThatSomethingShouldHappen()
    {
        $this->assertEquals("a", "a");
        $this->assertEquals([0], [0]);
    }
}
