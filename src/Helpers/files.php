<?php

function createDir($path)
{
    $dir = dirname($path);

    if (!file_exists($dir)) {
        mkdir($dir, 0757, true);
    }
}