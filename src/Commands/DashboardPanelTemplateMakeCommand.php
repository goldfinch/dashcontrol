<?php

namespace Goldfinch\Dashboard\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'make:panel-template')]
class DashboardPanelTemplateMakeCommand extends GeneratorCommand
{
    protected static $defaultName = 'make:panel-template';

    protected $description = 'Create Dashboard Panel template';

    protected $path = 'themes/[theme]/templates/[namespace_root]/Panels';

    protected $type = 'panel template';

    protected $stub = 'panel-template.stub';

    protected $suffix = 'Panel';

    protected $extension = '.ss';
}
