<?php

namespace Idnan\Jenkins;

use Symfony\Component\Console\Input\InputArgument;

/**
 * Class DeployCommand
 *
 * @package Idnan\Jenkins
 */
class DeployCommand extends Command
{

    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName('run')
             ->setDescription('Run the specified job in jenkins')
             ->addArgument('job', InputArgument::REQUIRED, 'Job name');
    }

    /**
     * Runs the command.
     *
     * @return void
     */
    public function process()
    {
        echo $this->input->getArgument('job');
    }
}