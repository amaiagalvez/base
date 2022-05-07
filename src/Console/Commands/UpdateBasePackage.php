<?php

namespace Amaia\Base\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpdateBasePackage extends Command
{
    protected $hidden = true;

    protected $signature = 'amaia:base-update';

    protected $description = 'Update the Base Package';

    public function handle()
    {
        $progressBar = $this->output->createProgressBar(7);

        $this->info('Updating Base Package...');

        if ($this->shouldOverwriteConfig()) {
            $this->info('Overwriting configuration files...');

            $this->publishConfiguration($progressBar);

            $this->advance($progressBar);

            $this->info('Updated Base Package');
        } else {
            $this->publishAssets($progressBar);

            $this->advance($progressBar);

            $this->info('Updated Assets');
        }
    }

    private function publishAssets($progressBar)
    {

        $this->advance($progressBar);
        exec('bash vendor/amaiagalvez/base/base_files_projects/rmFiles.sh');

        $params_update = [
            '--tag' => "amaia-base-update",
            '--force' => true
        ];

        $this->advance($progressBar);
        $this->call('vendor:publish', $params_update);
    }

    private function publishConfiguration($progressBar)
    {

        $this->advance($progressBar);
        exec('bash vendor/amaiagalvez/base/base_files_projects/rmFiles.sh');

        $params_update = [
            '--tag' => "amaia-base-update",
            '--force' => true
        ];

        $this->advance($progressBar);
        $this->call('vendor:publish', $params_update);

        $this->advance($progressBar);
        exec('composer update');

        $this->advance($progressBar);
        $this->call('migrate');

        $this->advance($progressBar);
        $this->call('db:seed');

        $this->advance($progressBar);
        $this->call('test');
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function advance($progressBar)
    {
        $this->line("");
        $this->line("");
        $progressBar->advance();
        $this->line("");
        $this->line("");
    }
}
