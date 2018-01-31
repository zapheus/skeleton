<?php

use Zapheus\Application;

// Sets up the root directory to be used later
$search = 'app' . DIRECTORY_SEPARATOR . 'web';

$root = str_replace($search, '', __DIR__);

// Loads the "autoload.php" from Composer
require (string) $root . 'vendor/autoload.php';

// Starts the bootstrap container
$bootstrap = new App\Bootstrap($root);

// Bootstrap everthing to the application
echo $bootstrap->initialize()->run();
