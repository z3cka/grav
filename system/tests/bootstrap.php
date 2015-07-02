<?php
namespace Grav;

use Grav\Common\Grav;

error_reporting(E_ALL);
date_default_timezone_set(@date_default_timezone_get());

// Register the auto-loader.
$loader = require_once __DIR__.'/../../vendor/autoload.php';

$grav = Grav::instance(
    array(
        'loader' => $loader
    )
);
