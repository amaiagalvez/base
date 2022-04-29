<?php

namespace App\Console\Commands\Stubs;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakePresenterCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:presenter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new present for the model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path() . '/stubs/presenter.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model.']
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Presenters';
    }
}
