<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once HELPERS . '/functions.php';
require_once CONFIG . '/routes.php';

if (PHP_MAJOR_VERSION < 8) {
    die('PHP Versiyasi 8 Den Kicik Olmamlaidir');
}

new \core\App();




