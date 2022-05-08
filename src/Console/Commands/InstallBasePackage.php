<?php

namespace Amaia\Base\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallBasePackage extends Command
{
    protected $hidden = true;

    protected $signature = 'amaia:base-install';

    protected $description = 'Install the Base Package';

    public function handle()
    {
        $progressBar = $this->output->createProgressBar(7);

        $this->info('Installing Base Package...');

        if (!$this->configExists('base.php')) {
            $this->info('Publishing configuration...');

            $this->publishConfiguration(false, $progressBar);

            $this->advance($progressBar);

            $this->info('Published configuration');

            $this->advance($progressBar);

            $this->error("replace xxxxx => project name");
            $this->error("RouteServiceProvider => HOME = '/bas/dashboard'");

            $this->info('Installed Base Package');
        } else {

            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration files...');

                $this->publishConfiguration($force = true, $progressBar);

                $this->info('Published configuration');

                $this->advance($progressBar);

                $this->error("replace xxxxx => project name");
                $this->error("RouteServiceProvider => HOME = '/bas/dashboard'");
                $this->error("execute docker profile npm");

                $this->info('Installed Base Package');
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }
    }

    private function configExists($fileName)
    {
        //TODO: kontrolatu noiz existitzen den fitxategia (orain beti galdetzen du)

        return File::exists(__DIR__ . '/../../../config/' . $fileName);
    }

    private function publishConfiguration($forcePublish = false, $progressBar)
    {
        $this->advance($progressBar);
        exec('bash vendor/amaiagalvez/base/base_files_projects/rmFiles.sh');
        exec('rm -R tests/Feature/*');

        $params_install = [
            '--tag' => "amaia-base-install",
        ];

        $params_update = [
            '--tag' => "amaia-base-update",
        ];

        if ($forcePublish === true) {
            $params_install['--force'] = true;
            $params_update['--force'] = true;
        }

        $this->advance($progressBar);
        $this->call('vendor:publish', $params_install);
        $this->call('vendor:publish', $params_update);

        $this->advance($progressBar);
        exec('rm composer.lock');
        exec('composer update');

        $this->advance($progressBar);
        $this->call('migrate');

        $this->advance($progressBar);
        $this->call('db:seed');

        exec('bash vendor/amaiagalvez/base/base_files_projects/clean.sh');
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
