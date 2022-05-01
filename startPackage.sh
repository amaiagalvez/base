#!/bin/bash

function packageStart {
    echo ">>>>> $1 <<<<<"

    docker run --rm -u 1000:1000 -d --name $1 \
        -v $HOME/Webguneak/dc-data/home:/home/application \
        -v $HOME/Webguneak/dc-data/composerCache:/composerCache \
        -v $HOME/Webguneak/Packages:/packages \
        -v $(pwd):/app \
        -e XDEBUG_CLIENT_PORT=9000 \
        -e XDEBUG_START_WITH_REQUEST='trigger' \
        -e XDEBUG_SESSION=VSCODE \
        -e XDEBUG_MODE='debug,develop,coverage,trace,profile' \
        -w /app webdevops/php-apache-dev:8.0

    echo " "
}

docker pull webdevops/php-apache-dev:8.0

if [ "$1" != "" ] && [ -d ../$1 ]; then
    packageStart $1
    docker exec -it $1 bash
fi
