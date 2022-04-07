<?php

include_once './init.php';

include app_path('middleware/auth.php');

$_SESSION['errors'] = [];

$userObj = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $userObj->escape_string($_POST['title']);
    $body = $userObj->escape_string($_POST['body']);
    $userId = $_SESSION['auth']['id'];

    $obj = new User();
    $obj->check();
    $errortitle = $obj->errortitle;
    $errorbody = $obj->errorbody;

    if (!$title) {
        $_SESSION['errors']['title'] = 'The title is required.';
    }

    if (!$body) {
        $_SESSION['errors']['body'] = 'The content is required.';
    }

    if (count($_SESSION['errors']) > 0) {
        redirect('post-create.php');
    }

    $result = $userObj->check_post_store($title, $body, $userId);
}

redirect('index.php');
