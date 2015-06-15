<?php
namespace Grav\Console\Cli;

use Grav\Common\Cache;
use Grav\Console\ConsoleTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class PopulateCacheCommand
 * @package Grav\Console\Cli
 */
class PopulateCacheCommand extends Command
{
    use ConsoleTrait;

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName("populate-cache")
            ->setDescription("Populates initial Grav cache")
            ->setHelp('The <info>populate-cache</info> caches the initial page isntances prior to a page being requested');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Create a red output option
        $output->getFormatter()->setStyle('red', new OutputFormatterStyle('red'));
        $output->getFormatter()->setStyle('cyan', new OutputFormatterStyle('cyan'));
        $output->getFormatter()->setStyle('green', new OutputFormatterStyle('green'));
        $output->getFormatter()->setStyle('magenta', new OutputFormatterStyle('magenta'));

        $this->populateCache($input, $output);
    }

    // Performs the initial page caching
    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    private function populateCache(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('');
        $output->writeln('<magenta>Populating cache</magenta>');
        $output->writeln('');

    }
}

