<?php

namespace App\Command;

use App\Service\Test\ResultGenerator;
use App\Utils\GeneratedResultGetter as GeneratedResultGetterTrait;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'verso:challengeTest')]
class ChallengeCommand extends Command
{
    use GeneratedResultGetterTrait;

    public function __construct(private readonly ResultGenerator $resultGenerator)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Tests the Verso GmbH Challenge')
             ->setHelp('This command allows you to test the requested challenge.')
             ->addArgument('amount', InputArgument::OPTIONAL, 'The amount of numbers to check.', 100)
             ->addArgument('fizzValue', InputArgument::OPTIONAL, 'The value to replace with Fizz.', 3)
             ->addArgument('buzzValue', InputArgument::OPTIONAL, 'The value to replace with Buzz.', 5);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $generatedResult = $this->getGeneratedResult($input->getArgument('amount'), $input->getArgument('fizzValue'),
            $input->getArgument('buzzValue'), $this->resultGenerator);

        foreach ($generatedResult as $result) {
            $result = match ($result) {
                ResultGenerator::FIZZ => '<info>' . $result . '</info>',
                ResultGenerator::BUZZ => '<question>' . $result . '</question>',
                (ResultGenerator::FIZZ . ResultGenerator::BUZZ) => '<comment>' . $result . '</comment>',
                default => $result,
            };
            $output->writeln($result);
        }

        return Command::SUCCESS;
    }
}