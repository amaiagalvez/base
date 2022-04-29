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
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed Base Package');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
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
        $params = [
            //'--provider' => "Amaia\\Base\\BasePackageServiceProvider",
            '--tag' => "amaia-base-config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);

        //TODO: migrations???
    }
}
