<?php

// Sets up the root directory to be used later
$search = 'app' . DIRECTORY_SEPARATOR . 'web';

$root = str_replace($search, '', __DIR__);

// Loads the "autoload.php" from Composer
require $root . 'vendor/autoload.php';

// Starts the bootstrap container
$bootstrap = new App\Bootstrap($root);

// Initializes and runs the application
echo $bootstrap->initialize()->run();
