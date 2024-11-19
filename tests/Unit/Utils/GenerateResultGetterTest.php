<?php

declare(strict_types=1);

namespace App\Tests\Unit\Utils;

use App\Service\Test\ResultGenerator;
use App\Utils\GeneratedResultGetter as GeneratedResultGetterTrait;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

class GenerateResultGetterTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testGetGeneratedResult(): void
    {
        $generatedResultGetter = new class() {
            use GeneratedResultGetterTrait;
        };

        $class = new ReflectionClass(get_class($generatedResultGetter));
        $method = $class->getMethod('getGeneratedResult');
        $method->setAccessible(true);

        $resultGenerator = $this->createConfiguredMock(ResultGenerator::class, ['generateResult' => [1, 2, 'Fizz']]);
        $result = $method->invokeArgs($generatedResultGetter, [3, 3, 5, $resultGenerator]);

        $this->assertIsArray($result);
        $this->assertSame([1, 2, 'Fizz'], $result);
    }
}
