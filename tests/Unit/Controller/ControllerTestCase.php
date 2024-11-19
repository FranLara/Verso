<?php

namespace App\Tests\Unit\Controller;

use App\Service\Test\ResultGenerator;
use PHPUnit\Framework\TestCase;

abstract class ControllerTestCase extends TestCase
{
    protected function getMockedResultGenerator(): ResultGenerator
    {
        $generatedResult = [1, 2, 'Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz'];

        return $this->createConfiguredMock(ResultGenerator::class, ['generateResult' => $generatedResult]);
    }
}