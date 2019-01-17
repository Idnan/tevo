<?php

namespace Idnan\Jenkins;

use Symfony\Component\Console\Question\Question;
use function App\Support\basePath;

/**
 * Class ConfigureCommand
 *
 * @package Idnan\Jenkins
 */
class ConfigureCommand extends Command
{
    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName("configure")
             ->setDescription("Configure the app for jenkins");
    }

    /**
     * Runs the command.
     *
     * @return void
     */
    public function process()
    {
        // ask for jenkins url
        if (!$jenkinsUrl = $this->askQuestion("URL: ")) $this->abort();

        // ask for jenkins token
        if (!$jenkinsToken = $this->askQuestion("Token: ")) $this->abort();

        // ask for jenkins username
        if (!$jenkinsUsername = $this->askQuestion("Username: ")) $this->abort();

        $this->output->writeln('[+] Downloading jenkins cli');
        if (!$this->downloadJenkinsCli($jenkinsUrl)) $this->abort("[-] An error occurred while downloading jenkins cli");

        $this->output->writeln('[+] Saving jenkins config');
        if (!$this->saveConfig($jenkinsUrl, $jenkinsToken, $jenkinsUsername)) $this->abort("[-] Unable to save jenkins config");

        $this->output->writeln('[+] Configured successfully');
    }

    /**
     * @param string $query
     * @param int    $maxRetries
     *
     * @return string|null
     */
    private function askQuestion(string $query, int $maxRetries = 3): ?string
    {
        $helper   = $this->getHelper("question");
        $question = new Question($query);

        while (empty($result) && $maxRetries > 0) {
            $result = $helper->ask($this->input, $this->output, $question);
            $maxRetries--;
        }

        return $result;
    }

    /**
     * @param string $jenkinsUrl
     * @param string $jenkinsToken
     * @param string $jenkinsUsername
     *
     * @return bool
     */
    private function saveConfig(string $jenkinsUrl, string $jenkinsToken, string $jenkinsUsername): bool
    {
        $fileName = '.jenkins';
        $savePath = basePath() . $fileName;

        $data = [
            'url'      => $jenkinsUrl,
            'token'    => $jenkinsToken,
            'username' => $jenkinsUsername,
            'cli'      => realpath(basePath() . static::JENKINS_CLI_NAME),
        ];

        return (bool)file_put_contents($savePath, serialize($data));
    }

    /**
     * Download jenkins cli
     *
     * @param string $jenkinsUrl
     *
     * @return bool
     */
    private function downloadJenkinsCli(string $jenkinsUrl): bool
    {
        $savePath    = basePath() . static::JENKINS_CLI_NAME;
        $downloadUrl = rtrim($jenkinsUrl, '\\') . static::JENKINS_DOWNLOAD_PATH;

        return (bool)file_put_contents($savePath, fopen($downloadUrl, 'r'));
    }
}