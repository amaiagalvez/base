<?php

function packagePublicDir()
{
    $origin = base_path() . '/public/';

    if (file_exists($origin . 'mix-manifest.json')) {
        return $origin;
    }

    return __DIR__ . '/../../';
}

function setPathPublic($app)
{
    //mix-manifest.json fitxategia bilatzen duelako
    //eta paketeetan ez du public karpetaren barruan sortzen

    $app->instance('path.public', packagePublicDir());
}
