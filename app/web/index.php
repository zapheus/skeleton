<?php

use App\Zapheus\BootstrapProvider;

// Sets up the root directory to be used later
$search = 'app' . DIRECTORY_SEPARATOR . 'web';

$root = str_replace($search, '', __DIR__);

// Loads the "autoload.php" from Composer
require $root . 'vendor/autoload.php';

// Creates a new Zapheus application
$app = new Zapheus\Application;

// Prepares the bootstrap provider object
$bootstrap = new BootstrapProvider($root);

// Then runs the application
echo $app->add($bootstrap)->run();
