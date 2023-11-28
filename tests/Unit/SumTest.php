<?php
function sum($num1, $num2)
{
    $total = 0;
    if ($num2 > $num1) {
        for ($i = $num1; $i <= $num2; $i++) {
            $total += $i;
        }
    } else if ($num1 > $num2) {
        for ($i = $num2; $i <= $num1; $i++) {
            $total += $i;
        }
    }
    return $total;
}
describe('sum of all numbers', function () {
    it('adds two numbers', function () {
        expect(sum(1, 2))->toBe(3);
    });
    it('sums numbers within a range', function () {
        expect(sum(1, 4))->toBe(10);
    });
    it('works with large numbers', function () {
        expect(sum(1, 4000))->toBe(8002000);
    });
});