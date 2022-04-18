<?php

include_once './init.php';

include app_path('middleware/auth.php');

$_SESSION['errors'] = [];

//$userObj = new User();
$errors = new ErrorBag;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['post_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    if (!$title) {
        $errors->put('password', 'The password');
    }
    if (!$body) {
        $errors->put('body', 'The body is required');
    }

    if (count($_SESSION['errors']) > 0) {
        redirect("post-edit.php?post_id=$id");
    }

    $sql = "UPDATE posts SET title='$title', body='$body' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        flash('success', 'A post was updated successfully.');
    } else {
        flash('danger', 'A post was updating failed.');
    }
}

redirect('index.php');
