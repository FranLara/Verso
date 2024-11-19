<?php

declare(strict_types=1);

namespace App\Tests\Unit\DTO;

use App\DTO\TestDTO;
use PHPUnit\Framework\TestCase;
use Random\RandomException;

class TestDTOTest extends TestCase
{
    /**
     * @throws RandomException
     */
    public function testConstructor(): void
    {
        $amount = random_int(1, 100);
        $fizzValue = random_int(1, 100);
        $buzzValue = random_int(1, 100);

        $testDTO = new TestDTO($amount, $fizzValue, $buzzValue);

        $this->assertEquals($amount, $testDTO->getAmount());
        $this->assertEquals($fizzValue, $testDTO->getFizzValue());
        $this->assertEquals($buzzValue, $testDTO->getBuzzValue());
    }

    /**
     * @throws RandomException
     */
    public function testGetAmount(): void
    {
        $amount = random_int(1, 100);

        $testDTO = new TestDTO($amount, random_int(1, 100), random_int(1, 100));

        $this->assertEquals($amount, $testDTO->getAmount());
    }

    /**
     * @throws RandomException
     */
    public function testGetFizzValue(): void
    {
        $fizzValue = random_int(1, 100);

        $testDTO = new TestDTO(random_int(1, 100), $fizzValue, random_int(1, 100));

        $this->assertEquals($fizzValue, $testDTO->getFizzValue());
    }

    /**
     * @throws RandomException
     */
    public function testGetBuzzValue(): void
    {
        $buzzValue = random_int(1, 100);

        $testDTO = new TestDTO(random_int(1, 100), random_int(1, 100), $buzzValue);

        $this->assertEquals($buzzValue, $testDTO->getBuzzValue());
    }
}
