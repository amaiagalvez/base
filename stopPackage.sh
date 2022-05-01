#!/bin/bash

function packageStop {
    echo ">>>>> $1 <<<<<"

    docker container kill $1

    echo " "
}

docker pull webdevops/php-apache-dev:8.0

if [ "$1" != "" ] && [ -d ../$1 ]; then
    packageStop $1
fi
