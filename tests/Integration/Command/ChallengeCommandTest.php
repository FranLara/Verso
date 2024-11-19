<?php

declare(strict_types=1);

namespace App\Tests\Integration\Command;

use App\Command\ChallengeCommand;
use App\Service\Test\ResultGenerator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ChallengeCommandTest extends TestCase
{
    public function testExecute(): void
    {
        $application = new Application();
        $application->add(new ChallengeCommand(new ResultGenerator()));

        $tester = new CommandTester($application->find('verso:challengeTest'));

        $tester->execute([]);

        $output = $tester->getDisplay();

        $this->assertStringContainsString('1', $output);
        $this->assertStringContainsString('2', $output);
        $this->assertStringContainsString('4', $output);
        $this->assertStringContainsString('7', $output);
        $this->assertStringContainsString('8', $output);
        $this->assertStringContainsString('11', $output);
        $this->assertStringContainsString('13', $output);
        $this->assertStringContainsString('14', $output);
        $this->assertStringContainsString('16', $output);
        $this->assertStringContainsString('17', $output);
        $this->assertStringContainsString('19', $output);
        $this->assertStringContainsString('22', $output);
        $this->assertStringContainsString('23', $output);
        $this->assertStringContainsString('26', $output);
        $this->assertStringContainsString('28', $output);
        $this->assertStringContainsString('29', $output);
        $this->assertStringContainsString('31', $output);
        $this->assertStringContainsString('32', $output);
        $this->assertStringContainsString('34', $output);
        $this->assertStringContainsString('37', $output);
        $this->assertStringContainsString('38', $output);
        $this->assertStringContainsString('41', $output);
        $this->assertStringContainsString('43', $output);
        $this->assertStringContainsString('44', $output);
        $this->assertStringContainsString('46', $output);
        $this->assertStringContainsString('47', $output);
        $this->assertStringContainsString('49', $output);
        $this->assertStringContainsString('52', $output);
        $this->assertStringContainsString('53', $output);
        $this->assertStringContainsString('56', $output);
        $this->assertStringContainsString('58', $output);
        $this->assertStringContainsString('59', $output);
        $this->assertStringContainsString('61', $output);
        $this->assertStringContainsString('62', $output);
        $this->assertStringContainsString('64', $output);
        $this->assertStringContainsString('67', $output);
        $this->assertStringContainsString('68', $output);
        $this->assertStringContainsString('71', $output);
        $this->assertStringContainsString('73', $output);
        $this->assertStringContainsString('74', $output);
        $this->assertStringContainsString('76', $output);
        $this->assertStringContainsString('77', $output);
        $this->assertStringContainsString('79', $output);
        $this->assertStringContainsString('82', $output);
        $this->assertStringContainsString('83', $output);
        $this->assertStringContainsString('86', $output);
        $this->assertStringContainsString('88', $output);
        $this->assertStringContainsString('89', $output);
        $this->assertStringContainsString('91', $output);
        $this->assertStringContainsString('92', $output);
        $this->assertStringContainsString('94', $output);
        $this->assertStringContainsString('97', $output);
        $this->assertStringContainsString('98', $output);
        $this->assertStringContainsString('Fizz', $output);
        $this->assertStringContainsString('Buzz', $output);
        $this->assertStringContainsString('FizzBuzz', $output);
    }
}
