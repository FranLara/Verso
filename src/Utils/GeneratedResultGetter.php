<?php

declare(strict_types=1);

namespace App\Utils;

use App\DTO\TestDTO;
use App\Service\Test\ResultGenerator;

trait GeneratedResultGetter
{
    protected function getGeneratedResult(
        int $amount,
        int $fizzValue,
        int $buzzValue,
        ResultGenerator $resultGenerator
    ): array {
        $testDTO = new TestDto($amount, $fizzValue, $buzzValue);

        return $resultGenerator->generateResult($testDTO);
    }
}