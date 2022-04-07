<?php

session_start();

define('APP_URL', 'http://localhost/blog');
define('APP_PATH', __DIR__);

include_once './helper.php';
include_once './db.php';
include_once './common/Session.php';
include_once './common/Auth.php';
include_once './common/User.php';
