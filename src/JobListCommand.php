<?php

namespace Idnan\Jenkins;

/**
 * Class JobListCommand
 *
 * @package Idnan\Jenkins
 */
class JobListCommand extends Command
{
    /** @var string */
    protected $command = "list-jobs";

    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName("list-jobs")
             ->setDescription("Lists all jobs");
    }
}