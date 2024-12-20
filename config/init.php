<?php

define("DEBUG", true);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/core');
define("HELPERS", ROOT . '/vendor/core/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'myshop');
define("PATH", 'http://e-market.loc');
define("ADMIN", 'http://e-market.loc/admin');
define("NO_IMAGE", '/public/uploads/no_image.jpg');

require_once ROOT . '/vendor/autoload.php';


