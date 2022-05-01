<?php

namespace Amaia\Base\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallBasePackage extends Command
{
    //To hide the command in the artisan list
    //protected $hidden = true;

    protected $signature = 'amaia:base-install';

    protected $description = 'Install the Base Package';

    public function handle()
    {
        $this->info('Installing Base Package...');

        $this->info('Publishing configuration...');

        if (!$this->configExists('base.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration files...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->error("replace xxxxx => project name");
        $this->error("copy .env.example => .env");
        $this->error("only if is the first time => php artisan key:generate");
        $this->error("only if is the first time => php artisan storage:link");
        $this->error("only if is the first time => create laraveltest database and give grant permissions to laravel user");

        if (config('app.env') == 'local') {
            $this->info('Clean files');
            exec('bash clean.sh');
        }

        $this->info('Installed Base Package');
    }

    private function configExists($fileName)
    {
        return File::exists(__DIR__ . '/../../../config/' . $fileName);
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params_config = [
            //'--provider' => "Amaia\\Base\\BasePackageServiceProvider",
            '--tag' => "amaia-base-config",
        ];

        $params_files = [
            '--tag' => "amaia-base-files",
        ];

        $params_tests = [
            '--tag' => "amaia-base-tests",
        ];

        $params_stubs = [
            '--tag' => "amaia-base-stubs",
        ];

        if ($forcePublish === true) {
            $params_config['--force'] = true;
            $params_files['--force'] = true;
            $params_tests['--force'] = true;
            $params_stubs['--force'] = true;
        }

        $this->call('vendor:publish', $params_files);

        if (config('app.env') == 'local') {
            $this->info('Remove files');
            exec('bash rmFiles.sh');
        }

        $this->call('vendor:publish', $params_config);
        $this->call('vendor:publish', $params_tests);
        $this->call('vendor:publish', $params_stubs);

        $this->call('migrate');
        $this->call('db:seed');

        //$this->call('test');
    }
}
