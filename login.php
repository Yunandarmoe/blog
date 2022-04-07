<?php

include_once './init.php';

$errors = [];

$userObj = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $userObj->escape_string($_POST['email']);
    $password = $userObj->escape_string($_POST['password']);

    $obj = new User($_POST['email'], $_POST['password']);
    $obj->check();
    $erroremail = $obj->erroremail;
    $errorpassword = $obj->errorpassword;

    if (!$email) {
        $errors['email'] = 'The email is required.';
    }

    if (!$password) {
        $errors['password'] = 'The password is required.';
    }

    $sql = "SELECT * FROM users WHERE `email`='$email' and `password`='$password'";
    $user_result = mysqli_query($conn, $sql);

    if ($user = mysqli_fetch_assoc($user_result)) {
        $_SESSION['auth'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];
    }

    if (count($errors) == 0) {
        $userObj = new User();
        $sql = "SELECT * FROM users WHERE `email`='$email' and `password`='$password'";
        $query = $userObj->connection->query($sql);

        $result = $userObj->check_login($email, $password);

        if ($result) {
            $_SESSION['auth'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
            ];
            redirect('index.php');
        }
    }
}

?>

<?php include './header.php' ?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <div class="card rounded-3 p-4" style="box-shadow: 0px 0px 20px rgb(0 0 0 / 30%);">
                <h2 class="text-center" style="color: #618edd;">LOGIN</h2>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control <?php if (isset($errors['email'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter email">
                            <div class="invalid-feedback" style="color: #DC3545;"><?php echo $erroremail; ?></div>
                        </div>
                        <div class="mt-3">
                            <label for="username" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control <?php if (isset($errors['password'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter password">
                            <div class="invalid-feedback" style="color: #DC3545;"><?php echo $errorpassword; ?></p>

                            </div>
                            <div class="mt-4">
                                <button type="submit" class="w-100 btn btn-primary">Login</button>
                            </div>
                        </div>
                        <p class="mt-4 text-center text-muted">Not a member? <a href="<?php echo url('register.php'); ?>">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include './footer.php' ?>