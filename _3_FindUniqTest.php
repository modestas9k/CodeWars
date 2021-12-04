<?php


use PHPUnit\Framework\TestCase;

function find_uniq($a)
{
    $uniqueValues = [];
    $duplicates = [];

    foreach ($a as $value) {
        if (in_array($value, $duplicates)) {
            // already in duplicates, skip!
            continue;
        } elseif (in_array($value, $uniqueValues)) {
            // previously unique, but another one was found - no longer unique
            $duplicates[] = $value;
            // remove this element from unique values array
            $uniqueValues = array_values(array_diff($uniqueValues, [$value]));
        } else {
            // new unique value
            $uniqueValues[] = $value;
        }
    }

    return $uniqueValues[0];
}

class FindUniqTest extends TestCase
{
    public function testExamples()
    {
        $this->assertEquals(2, find_uniq([1, 1, 1, 2, 1, 1]));
        $this->assertEquals(0.55, find_uniq([0, 0, 0.55, 0, 0]));
        $this->assertEquals(1, find_uniq([0, 1, 0]));
    }
}
