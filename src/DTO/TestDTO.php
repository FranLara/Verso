<?php

declare(strict_types=1);

namespace App\DTO;

readonly class TestDTO
{
    public function __construct(
        private int $amount,
        private int $fizzValue,
        private int $buzzValue
    ) {
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getFizzValue(): int
    {
        return $this->fizzValue;
    }

    public function getBuzzValue(): int
    {
        return $this->buzzValue;
    }
}