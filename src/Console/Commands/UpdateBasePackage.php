<?php

namespace Amaia\Base\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpdateBasePackage extends Command
{
    protected $signature = 'amaia:base-update';

    protected $description = 'Update the Base Package';

    public function handle()
    {
        $progressBar = $this->output->createProgressBar(10);

        $progressBar->start();
        $this->line("");

        $this->info('Updating Base Package...');
        $progressBar->advance();
        $this->line("");
        $this->info('Overwriting configuration files...');
        $this->publishConfiguration(true, $progressBar);

        $this->error("replace xxxxx => project name");

        if (config('app.env') == 'local') {
            $this->info('Clean files');
            exec('bash clean.sh');
        }

        $progressBar->finish();
        $this->line("");
        $this->info('Updated Base Package');
    }

    private function publishConfiguration($forcePublish = false, $progressBar)
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

        $params_config['--force'] = true;
        $params_files['--force'] = true;
        $params_tests['--force'] = true;
        $params_stubs['--force'] = true;

        $progressBar->advance();
        $this->line("");
        $this->call('vendor:publish', $params_files);
        $progressBar->advance();
        $this->line("");
        if (config('app.env') == 'local') {
            $this->info('Remove files');
            exec('bash rmFiles.sh');
            exec('rm tests/Feature/*');
        }
        $progressBar->advance();
        $this->line("");
        $this->call('vendor:publish', $params_config);
        $progressBar->advance();
        $this->line("");
        $this->call('vendor:publish', $params_tests);
        $progressBar->advance();
        $this->line("");
        $this->call('vendor:publish', $params_stubs);

        exec('rm -R public/css');
        exec('rm -R public/js');
        exec('rm composer.lock');
        exec('composer update');
        $progressBar->advance();
        $this->line("");
        $this->call('migrate');
        $this->call('db:seed');

        $progressBar->advance();
        $this->line("");
        $this->call('test');
        $progressBar->advance();
        $this->line("");
    }
}
