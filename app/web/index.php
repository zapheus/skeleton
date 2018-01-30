<?php

// Sets up the root directory to be used later
$search = 'app' . DIRECTORY_SEPARATOR . 'web';

$root = str_replace($search, '', __DIR__);

// Loads the "autoload.php" from Composer
require (string) $root . 'vendor/autoload.php';

// Starts the bootstrap container
$container = new App\Bootstrap($root);

$zapheus = new Zapheus\Application($container);

// Prepares the providers and run the application
echo $container->providers($zapheus)->run();
