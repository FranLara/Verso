<?php

declare(strict_types=1);

namespace App\Service\Test;

use App\DTO\TestDTO;

class ResultGenerator
{
    public const string FIZZ = 'Fizz';
    public const string BUZZ = 'Buzz';

    private TestDTO $testValues;

    public function generateResult(TestDTO $testValues): array
    {
        $this->testValues = $testValues;

        return array_map(fn(int $number) => $this->getGeneratedValue($number), range(1, $testValues->getAmount()));
    }

    private function getGeneratedValue(int $number): string
    {
        if (($number % $this->testValues->getFizzValue() !== 0) && ($number % $this->testValues->getBuzzValue() !== 0)) {
            return (string) $number;
        }
        if ($number % ($this->testValues->getFizzValue() * $this->testValues->getBuzzValue()) === 0) {
            return self::FIZZ . self::BUZZ;
        }
        if ($number % $this->testValues->getBuzzValue() === 0) {
            return self::BUZZ;
        }

        return self::FIZZ;
    }
}