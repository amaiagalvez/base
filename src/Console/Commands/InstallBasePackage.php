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
        $this->error("RouteServiceProvider => HOME = '/bas/dashboard'");

        $this->error("webpack.mix.js => mix.copyDirectory('vendor/amaiagalvez/base/public/css', 'public/base/css');");
        $this->error("webpack.mix.js => mix.copyDirectory('vendor/amaiagalvez/base/public/css', 'public/base/js');");

        if (config('app.env') == 'local') {
            $this->info('Clean files');
            exec('bash clean.sh');
        }

        $this->info('Installed Base Package');
    }

    private function configExists($fileName)
    {
        //TODO: kontrolatu noiz existitzen den fitxategia

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
            exec('rm tests/Feature/*');
        }

        $this->call('vendor:publish', $params_config);
        $this->call('vendor:publish', $params_tests);
        $this->call('vendor:publish', $params_stubs);

        exec('rm -R public/css');
        exec('rm -R public/js');
        exec('rm composer.lock');
        exec('composer update');

        $this->call('migrate');
        $this->call('db:seed');

        $this->call('test');
    }
}
