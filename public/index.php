<?php
define('BASE_PATH', realpath('../'));

require BASE_PATH . '/bootstrap/autoload.php';

if(!session_id()){
    session_start();
}

\App\Router::dispatch();