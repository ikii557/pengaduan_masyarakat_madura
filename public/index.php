<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// Define the start time to measure performance
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance mode using "php artisan down",
| this script will load the maintenance page instead of starting
| the application, preventing errors during maintenance.
|
*/

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides an automatically generated class loader for our
| application. We just need to require it into the script here so
| we do not need to manually load any of our application's classes.
|
*/

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the application's HTTP kernel. The response is then sent
| back to the client's browser, allowing them to use the application.
|
*/

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Create the HTTP kernel instance
$kernel = $app->make(Kernel::class);

// Handle the incoming request and send the response back to the client
$response = $kernel->handle(
    $request = Request::capture()
)->send();

// Terminate the application
$kernel->terminate($request, $response);
