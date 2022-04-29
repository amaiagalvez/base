<?php

namespace App\Console\Commands\Stubs;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeViewCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path() . '/stubs/view.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the views folder.']
        ];
    }

    public function handle()
    {
        $view =  Str::camel($this->argument('name'));

        $path = $this->viewPath($view) . '/index.blade.php';

        createDir($path);

        if (File::exists($path)) {
            $this->error("File {$path} already exists!");
            return;
        }

        File::put($path, '');

        $this->info("File {$path} created.");

        $path = $this->viewPath($view) . '/form.blade.php';

        createDir($path);

        if (File::exists($path)) {
            $this->error("File {$path} already exists!");
            return;
        }

        File::put($path, '');


        $this->info("File {$path} created.");
    }
}
