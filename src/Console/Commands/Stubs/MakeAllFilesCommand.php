<?php

namespace App\Console\Commands\Stubs;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeAllFilesCommand extends GeneratorCommand
{
    /* php artisan make:allfiles -mcrfswtdz xxxxxx */

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:allfiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all files for a model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->option('pivot')
            ? $this->resolveStubPath('/stubs/model.pivot.stub')
            : $this->resolveStubPath('/stubs/model.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        if ($this->option('all')) {
            $this->input->setOption('factory', true);
            $this->input->setOption('seed', true);
            $this->input->setOption('migration', true);
            $this->input->setOption('controller', true);
            $this->input->setOption('policy', true);
            $this->input->setOption('resource', true);
            $this->input->setOption('view', true);
            $this->input->setOption('test', true);
            $this->input->setOption('documentation', true);
        }

        $this->createModel();

        if ($this->option('factory')) {
            $this->createFactory();
        }

        if ($this->option('migration')) {
            $this->createMigration();
        }

        if ($this->option('seed')) {
            $this->createSeeder();
        }

        if ($this->option('controller') || $this->option('resource') || $this->option('api')) {
            $this->createController();
        }

        if ($this->option('policy')) {
            $this->createPolicy();
        }

        if ($this->option('view')) {
            $this->createView();
        }

        if ($this->option('test')) {
            $this->createTest();
        }

        if ($this->option('documentation')) {
            $this->createDocumentation();
        }

        if ($this->option('presenter')) {
            $this->createPresenter();
        }

        //TODO: Sortzen da modeloa kanpon eta ez dakit nola kendu
        unlink(base_path("app/{$this->argument('name')}.php"));

        $this->info('Successfully create all files.');
    }

    /**
     * Create a model for the model.
     *
     * @return void
     */
    protected function createModel()
    {
        $model = Str::studly($this->argument('name'));

        $this->call('make:model', [
            'name' => "{$model}"
        ]);
    }

    /**
     * Create a model factory for the model.
     *
     * @return void
     */
    protected function createFactory()
    {
        $factory = Str::studly($this->argument('name'));

        $this->call('make:factory', [
            'name' => "{$factory}Factory",
            '--model' => $this->qualifyClass($this->getNameInput()),
        ]);
    }

    /**
     * Create a migration file for the model.
     *
     * @return void
     */
    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
        ]);
    }

    /**
     * Create a seeder file for the model.
     *
     * @return void
     */
    protected function createSeeder()
    {
        $seeder = Str::studly(class_basename($this->argument('name')));

        $this->call('make:seeder', [
            'name' => "{$seeder}Seeder",
        ]);
    }

    /**
     * Create view files for the model.
     *
     * @return void
     */
    protected function createView()
    {
        $view = Str::camel(class_basename($this->argument('name')));

        $this->call('make:view', [
            'name' => "{$view}",
        ]);
    }

    /**
     * Create test files for the tests.
     *
     * @return void
     */
    protected function createTest()
    {
        $test = Str::studly(class_basename($this->argument('name')));

        //Feature

        $this->call('make:test', [
            'name' => "{$test}/CreateTest",
        ]);
        $this->call('make:test', [
            'name' => "{$test}/StoreTest",
        ]);
        $this->call('make:test', [
            'name' => "{$test}/EditTest",
        ]);
        $this->call('make:test', [
            'name' => "{$test}/UpdateTest",
        ]);
        $this->call('make:test', [
            'name' => "{$test}/DeleteTest",
        ]);

        //Unit

        $this->call('make:test', [
            'name' => "Models/{$test}Test",
            '--unit' => '--unit',
        ]);
    }

    /**
     * Create files for the documentation.
     *
     * @return void
     */
    protected function createDocumentation()
    {
        $documentation = Str::lower(class_basename($this->argument('name')));

        $this->call('make:documentation', [
            'name' => "{$documentation}",
        ]);
    }

    /**
     * Create file for the presenter.
     *
     * @return void
     */
    protected function createPresenter()
    {
        $presenter = Str::studly(class_basename($this->argument('name')));

        $this->call('make:presenter', [
            'name' => "{$presenter}",
        ]);
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('make:controller', array_filter([
            'name' => "{$controller}Controller",
            '--model' => $this->option('resource') || $this->option('api') ? $modelName : null,
            '--api' => $this->option('api'),
        ]));
    }

    /**
     * Create a policy file for the model.
     *
     * @return void
     */
    protected function createPolicy()
    {
        $policy = Str::studly(class_basename($this->argument('name')));

        $this->call('make:policy', [
            'name' => "{$policy}Policy",
            '--model' => $this->qualifyClass($this->getNameInput()),
        ]);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate a migration, seeder, factory, policy, and resource controller for the model'],
            ['controller', 'c', InputOption::VALUE_NONE, 'Create a new controller for the model'],
            ['factory', 'f', InputOption::VALUE_NONE, 'Create a new factory for the model'],
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the model already exists'],
            ['migration', 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model'],
            ['policy', null, InputOption::VALUE_NONE, 'Create a new policy for the model'],
            ['seed', 's', InputOption::VALUE_NONE, 'Create a new seeder for the model'],
            ['pivot', 'p', InputOption::VALUE_NONE, 'Indicates if the generated model should be a custom intermediate table model'],
            ['resource', 'r', InputOption::VALUE_NONE, 'Indicates if the generated controller should be a resource controller'],
            ['api', null, InputOption::VALUE_NONE, 'Indicates if the generated controller should be an API controller'],

            ['view', 'w', InputOption::VALUE_NONE, 'Create views for the model'],
            ['test', 't', InputOption::VALUE_NONE, 'Create test for the model'],
            ['documentation', 'd', InputOption::VALUE_NONE, 'Create file for the documentation'],
            ['presenter', 'z', InputOption::VALUE_NONE, 'Create file for the presenter'],
        ];
    }
}
