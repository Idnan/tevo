<?php

namespace Idnan\Jenkins;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Command
 *
 * @package Idnan\Jenkins
 */
abstract class Command extends SymfonyCommand
{
    /** @var InputInterface $input */
    protected $input;

    /** @var OutputInterface $output */
    protected $output;

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input  = $input;
        $this->output = $output;

        $this->process();
    }

    /**
     * Runs the command.
     *
     * @return void
     */
    public abstract function process();

    /**
     * Exit the application
     *
     * @param string $message
     */
    public function abort(string $message = ''): void
    {
        if (!empty($message)) {
            $this->output->writeln($message);
        }
        exit(0);
    }
}