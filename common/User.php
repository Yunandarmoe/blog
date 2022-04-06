<?php

class User extends DbConnection
{
    //public function __construct()
    //{
    //    parent::__construct();
    //}

    public function check_login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE `email`='$email' and `password`='$password'";
        $query = $this->connection->query($sql);

        if ($query->num_rows > 0) {
            redirect('index.php');
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

    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}
