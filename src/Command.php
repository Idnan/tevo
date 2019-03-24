<?php

namespace Idnan\Jenkins;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function App\Support\basePath;

/**
 * Class Command
 *
 * @package Idnan\Jenkins
 */
abstract class Command extends SymfonyCommand
{
    const JENKINS_CLI_NAME      = 'jenkins-cli.jar';
    const JENKINS_DOWNLOAD_PATH = '/jnlpJars/jenkins-cli.jar';

    /** @var InputInterface $input */
    protected $input;

    /** @var OutputInterface $output */
    protected $output;

    /** @var string */
    protected $command;

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
    protected function abort(string $message = ''): void
    {
        if (!empty($message)) {
            $this->output->writeln($message);
        }
        exit(0);
    }

    /**
     * @return string
     */
    protected function getJenkinsCliPath(): string
    {
        return $this->getJenkinsConfig()['cli'] ?? '';
    }

    /**
     * @return string
     */
    protected function getJenkinsUrl(): string
    {
        return $this->getJenkinsConfig()['url'] ?? '';
    }

    /**
     * @return string
     */
    protected function getJenkinsToken(): string
    {
        return $this->getJenkinsConfig()['token'] ?? '';
    }

    /**
     * @return string
     */
    protected function getJenkinsUsername(): string
    {
        return $this->getJenkinsConfig()['username'] ?? '';
    }

    /**
     * @return array
     */
    protected function getJenkinsConfig(): array
    {
        $path = basePath() . '.jenkins';

        return unserialize(file_get_contents($path));
    }

    /**
     * @return bool
     */
    public function exec()
    {
        $cli       = $this->getJenkinsCliPath();
        $url       = $this->getJenkinsUrl();
        $username  = $this->getJenkinsUsername();
        $token     = $this->getJenkinsToken();
        $isVerbose = $this->output->isVerbose();

        $command = "java -jar {$cli} -s '{$url}' -auth {$username}:{$token} {$this->command}";

        if ($isVerbose) {
            $command .= " -v";
        }

        system($command, $result);

        return $result == 0;
    }
}