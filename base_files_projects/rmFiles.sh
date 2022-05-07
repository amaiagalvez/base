# laravel garbitu
rm -R app/Actions
rm -R app/Policies
rm -R app/Models
rm -R app/View
rm app/Providers/AuthServiceProvider.php
rm app/Providers/FortifyServiceProvider.php
rm app/Providers/JetstreamServiceProvider.php
rm database/factories/TeamFactory.php
rm database/factories/UserFactory.php
rm database/migrations/*
rm -R resources/views/*
rm -R resources/markdown
rm stubs/*
rm -R tests/Feature/Jeststream
# larecipe vendor garbitu (berpublikatzeko)
rm -R public/vendor/binarytorch
rm -R resources/views/vendor/larecipe
# Base paketea garbitu (berpublikatzeko)
rm -R public/base
rm -R resources/docs/eu/base
rm -R resources/docs/es/base
rm -R tests/Feature/base
rm -R tests/Unit/base
# Project .lock (composer exekutatzeko)
rm composer.lock