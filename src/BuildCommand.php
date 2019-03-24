<?php

namespace Idnan\Jenkins;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class BuildCommand
 *
 * @package Idnan\Jenkins
 */
class BuildCommand extends Command
{
    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName("build")
             ->setDescription("Trigger a new build")
             ->addArgument("job", InputArgument::REQUIRED, "Job name")
             ->addOption("wait", "w", InputOption::VALUE_NONE, "Wait until the completion/abortion of the command")
             ->addOption("params", "p", InputOption::VALUE_OPTIONAL, "Specify the build parameters in the key=value format");
    }

    /**
     * Runs the command.
     *
     * @return void
     */
    public function process()
    {
        $job    = $this->input->getArgument("job");
        $wait   = $this->input->getOption("wait");
        $params = $this->input->getOption("params");

        $this->command = "build {$job}";

        // wait until the completion/abortion of the command
        if ($wait) {
            $this->command .= " -s";
        }

        // build parameters in the key=value format
        if (!empty($params)) {
            $this->command .= " -p {$params}";
        }

        if (!$this->exec()) {
            $this->abort("[-] Build failed");
        }
    }
}