<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Test;

use App\DTO\TestDTO;
use App\Service\Test\ResultGenerator;
use PHPUnit\Framework\TestCase;

class ResultGeneratorTest extends TestCase
{
    /**
     * @dataProvider providerTestValues
     */
    public function testGenerateResult(array $expectedResult, int $amount, int $fizzValue, int $buzzValue): void
    {
        $testValues = new TestDTO($amount, $fizzValue, $buzzValue);

        $result = (new ResultGenerator())->generateResult($testValues);

        $this->assertSame($expectedResult, $result);
    }

    public static function providerTestValues(): array
    {
        return [
            [['1', 'Fizz', 'Buzz', 'Fizz', '5', 'FizzBuzz', '7', 'Fizz', 'Buzz', 'Fizz'], 10, 2, 3],
            [['1', '2', 'Fizz', '4', 'Buzz', 'Fizz', '7', '8', 'Fizz', 'Buzz', '11', 'Fizz', '13', '14'], 14, 3, 5],
        ];
    }
}
