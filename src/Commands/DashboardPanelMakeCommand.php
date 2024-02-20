<?php

namespace Goldfinch\Dashboard\Commands;

use Goldfinch\Taz\Services\InputOutput;
use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'make:panel')]
class DashboardPanelMakeCommand extends GeneratorCommand
{
    protected static $defaultName = 'make:panel';

    protected $description = 'Create Dashboard Panel';

    protected $path = '[psr4]/Panels';

    protected $type = 'panel';

    protected $stub = 'panel.stub';

    protected $suffix = 'Panel';

    protected function configure(): void
    {
        parent::configure();

        $this->addArgument(
            'panelname',
            InputArgument::REQUIRED,
       );
    }

    protected function promptForMissingArgumentsUsing()
    {
        $params = parent::promptForMissingArgumentsUsing();

        $params += [
            'panelname' => 'Specify title for this panel',
        ];

        return $params;
    }

    protected function execute($input, $output): int
    {
        $state = parent::execute($input, $output);

        if ($state === false) {
            return Command::FAILURE;
        }

        $nameInput = $this->getAttrName($input);

        // create page template
        $command = $this->getApplication()->find('make:panel-template');
        $command->run(new ArrayInput(['name' => $nameInput]), $output);

        $io = new InputOutput($input, $output);
        $io->info('To make the new panel appear on your dashboard, run dev/build');

        return Command::SUCCESS;
    }

    protected function replacer()
    {
        $panelname = $this->input->getArgument('panelname');

        return [
            [$panelname, '{{ panelname }}', $panelname],
        ];
    }
}
