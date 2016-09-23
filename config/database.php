<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$connection = [];

switch(env('DB_CONNECTION')){
    case 'mysql':
        $connection = [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'port'      => env('DB_PORT', '3306'),
            'database'  => env('DB_DATABASE', 'microvi'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => env('DB_PREFIX', ''),
        ];
        break;
    case 'pgsql':
        $connection = [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'microvi'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => env('DB_PREFIX', ''),
            'schema' => 'public',
            'sslmode' => 'prefer',
        ];
        break;
    case 'sqlite':
    default:
        $connection = [
            'driver' => 'sqlite',
            'database' => database_path(env('DB_DATABASE', 'sqlite.db')),
            'prefix' => '',
        ];
}

$capsule->addConnection($connection);

// Set the event dispatcher used by Eloquent models... (optional)
//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;
//$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();