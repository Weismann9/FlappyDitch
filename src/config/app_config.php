<?php

const APP_NAME = 'FlappyDitch';

//Project constants
const TYPE_JS = 'script';
const TYPE_CSS = 'stylesheet';
const VENDORS_ROOT = '/vendor/';
const ASSETS_ROOT = '/assets/';
const CHARACTERS_ROOT = ASSETS_ROOT . 'media/characters/';

//When adding vendors or assets, ORDER IS IMPORTANT
const APP_VENDORS = [
    //jQuery slim and popper min HAVE to be loaded before Bootstrap
    'jquery-3.3.1.slim.min.js' => TYPE_JS,
    'popper.min.js' => TYPE_JS,
    'bootstrap.min.css' => TYPE_CSS,
    'bootstrap.min.js' => TYPE_JS,
    // jquery HAS to be loaded before backgroundvideo extension
    'jquery.js' => TYPE_JS,
    'phaser.js' => TYPE_JS,
];

const APP_ASSETS = [
    'https://fonts.googleapis.com/css?family=Lobster' => TYPE_CSS,
    'main.css' => TYPE_CSS,
];

function RenderHead()
{
    $head = "<title>" . APP_NAME . "</title>";
    foreach (APP_VENDORS as $source => $type) {
        $path = (!strstr($source, 'http')) ? VENDORS_ROOT . $source : $source;
        switch ($type) {
            case TYPE_JS:
                $head .= "<script rel='script' type='text/javascript' src='$path'></script>";
                break;
            case TYPE_CSS:
                $head .= "<link rel='stylesheet' type='text/css' href='$path'>";
                break;
        }
    }
    foreach (APP_ASSETS as $source => $type) {
        $path = (!strstr($source, 'http')) ? ASSETS_ROOT . $source : $source;
        switch ($type) {
            case TYPE_JS:
                $head .= "<script rel='script' type='text/javascript' src='$path'></script>";
                break;
            case TYPE_CSS:
                $head .= "<link rel='stylesheet' type='text/css' href='$path'>";
                break;
        }
    }
    return $head;
}



