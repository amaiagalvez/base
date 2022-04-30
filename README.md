<p align="center"><a href="https://getcomposer.org/" target="_blank" title="Composer"><img src="https://getcomposer.org/img/logo-composer-transparent5.png" width="150"></a></p>

<p align="center">
Version: 2.3.5
</p>

<p align="center"><a href="https://laravel.com" target="_blank" title="Laravel"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
Version: 9.2
</p>

<p align="center"><a href="https://laravelpackage.com/" target="_blank" title="Laravel Package Development"><img src="https://laravelpackage.com/laravel-package-logo.png" width="150"></a></p>

<p align="center">
Version: Laravel 8.x
</p>

## Get Started

```
sudo apt install php-cli php-xml php-curl unzip
```
<a href="https://getcomposer.org/download/">Download Composer</a>  


## Install new project

- **Laravel 9.2 + Jetstream + Tailwind**
```
    laravel new --jet xxxxx
```

- **Git**
```
    git init
    git add .
    git commit -am "laravel 9.2 + jetstream"
    >>>> git push
```

- **Docker**
```
    copy **docker-compose.yaml** && replace xxxxx => project name
    > Docker: Compose up
    **.env** => database config
```

- **Base Package**
```
    **composer.json** => "amaiagalvez/base": "^1.0" 
    local package =>
            "repositories": [
                {
                "type": "path",
                "url": "../packages/base",
                "options": {
                    "symlink": true
                }
                }
            ]    
    > Docker: Compose up - Services - Profiles (composer) 
    > open Shell
    php artisan amaia:base-install
    >>>>> red messages!!

```