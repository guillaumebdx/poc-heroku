<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 14:01
 */
var_dump(getenv('ENV'));die;
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/routing.php';

if (getenv('ENV') != 'prod') {
    require_once __DIR__ . '/../config/debug.php';
    require_once __DIR__ . '/../config/db.php';
}

