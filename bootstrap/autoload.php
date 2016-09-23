<?php

require BASE_PATH . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(BASE_PATH);
$dotenv->load();

$helperpath = BASE_PATH . '/app/helpers';

$helpers = new RegexIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($helperpath)), '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach($helpers as $name => $helper){
    require $name;
}

require BASE_PATH . '/config/database.php';