<?php

namespace Amaia\Base\Console\Commands\Stubs;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeDocumentationCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:documentation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new file documentation';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path() . '/stubs/documentation.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the documentation file.']
        ];
    }

    public function handle()
    {
        $document =  Str::lower($this->argument('name'));

        $path = 'resources/docs/1.0/' . $document . '.md';

        createDir($path);

        if (File::exists($path)) {
            $this->error("File {$path} already exists!");
            return;
        }

        File::put($path, '');

        $this->info("File {$path} created.");
    }
}
