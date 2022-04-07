<?php

class User extends DbConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_db($email, $password)
    {
        $sql = "SELECT * FROM users WHERE `email`='$email' and `password`='$password'";
        $query = $this->connection->query($sql);

        if ($query->num_rows > 0) {
            redirect('index.php');
        }
    }

    public function check_login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE `email`='$email' and `password`='$password'";
        $query = $this->connection->query($sql);

        //if ($query->num_rows > 0) {
        //    redirect('index.php');
        //}
        //if ($query->num_rows > 0) {
        //    $row = $query->fetch_array();
        //    return $row['id'];
        //} else {
        //    return false;
        //}
        if ($query->num_rows > 0) {
            $row = $query->fetch_array();
            return $row['id'];
        } else {
            return false;
        }
    }

    public function check_register($name, $email, $password)
    {
        $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
        $query = $this->connection->query($sql);

        if ($query) {
            redirect('login.php');
        }
    }

    public function check_profile_edit($name, $password, $id)
    {
        $sql = "UPDATE users SET `name`='$name', `password`='$password' where `id`='$id'";;
        $query = $this->connection->query($sql);

        if ($query->num_rows > 0) {
            redirect('index.php');
        }
    }

    public function check_post_store($title, $body, $userId)
    {
        $sql = "INSERT INTO posts (`title`, `body`, `user_id`) VALUES ('$title', '$body', '$userId')";
        $query = $this->connection->query($sql);

        if ($query) {
            redirect('index.php');
        }
    }

    public function check_post_update($id, $title, $body)
    {
        $sql = "UPDATE posts SET title='$title', body='$body' WHERE id='$id'";
        $query = $this->connection->query($sql);

        if ($query) {
            redirect('index.php');
        }
    }

    public function check_post_delete($id)
    {
        $sql = "DELETE FROM posts WHERE id='$id'";
        $query = $this->connection->query($sql);

        if ($query) {
            redirect('index.php');
        }
    }

    public 
    $email, 
    $password, 
    $name, 
    $title,
    $body,
    $erroremail = '', 
    $errorpassword = '', 
    $errorname = '',
    $errortitle = '',
    $errorbody = '';

    public function __constructor($errorE, $errorP, $errorN, $errorT, $errorB)
    {
        $this->email = $errorE;
        $this->password = $errorP;
        $this->username = $errorN;
        $this->title = $errorT;
        $this->body = $errorB;
    }

    public function check()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($this->email)) {
                $this->erroremail = 'The email is required.';
            }

            if (empty($this->password)) {
                $this->errorpassword = 'The password is required';
            }

            if (empty($this->name)) {
                $this->errorname = 'The name is required';
            }

            if (empty($this->title)) {
                $this->errortitle = 'The title is required';
            }

            if (empty($this->body)) {
                $this->errorbody = 'The body is required';
            }
        }
    }


    public function details($sql)
    {

        $query = $this->connection->query($sql);

        $row = $query->fetch_array();

        return $row;
    }

    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}

$obj = new User();
$obj->check();
$erroremail = $obj->erroremail;
$errorpassword = $obj->errorpassword;
$errorname = $obj->errorname;
$errortitle = $obj->errortitle;
$errorbody = $obj->errorbody;
