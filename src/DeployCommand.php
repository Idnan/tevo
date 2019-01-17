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
        $this->setName('deploy')
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
        $job = $this->input->getArgument('job');

        $command = $this->prepareCommand($job);

        system($command, $result);

        if ($result != 0) {
            $this->abort("[-] Deployment failed");
        }
    }

    /**
     * @param string $job
     *
     * @return string
     */
    private function prepareCommand(string $job): string
    {
        $cli       = $this->getJenkinsCliPath();
        $url       = $this->getJenkinsUrl();
        $username  = $this->getJenkinsUsername();
        $token     = $this->getJenkinsToken();
        $isVerbose = $this->output->isVerbose();

        $command = "java -jar {$cli} -s '{$url}' -auth {$username}:{$token} build {$job} -s";

        if ($isVerbose) {
            $command .= " -v";
        }

        return $command;
    }
}