<?php

include_once './init.php';

$errors = [];

$userObj = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $userObj->escape_string($_POST['name']);
    $email = $userObj->escape_string($_POST['email']);
    $password = $userObj->escape_string($_POST['password']);

    if (!$name) {
        $errors['name'] = 'The name is required.';
    }

    if (!$email) {
        $errors['email'] = 'The email is required.';
    }
    if (!$password) {
        $errors['password'] = 'The password is required.';
    }

    if (count($errors) == 0) {
        $result = $userObj->check_register($name, $email, $password);

        if ($result) {
            redirect('login.php');
        }
    }
}

?>

<?php include './header.php' ?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <div class="card rounded-3 p-4" style="box-shadow: 0px 0px 20px rgb(0 0 0 / 30%);">
                <h2 class="text-center" style="color: #618edd;">SIGN UP</h2>
                <form action="register.php" method="POST">
                    <div class="form-group mt-3">
                        <div>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control  <?php if (isset($errors['name'])) : ?> is-invalid <?php endif; ?>">
                            <?php if (isset($errors['name'])) : ?>
                                <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control  <?php if (isset($errors['email'])) : ?> is-invalid <?php endif; ?>">
                            <?php if (isset($errors['email'])) : ?>
                                <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control  <?php if (isset($errors['password'])) : ?> is-invalid <?php endif; ?>">
                            <?php if (isset($errors['password'])) : ?>
                                <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="w-100 btn btn-primary">Signup</button>
                        </div>
                        <p class="mt-3 text-center text-muted">Already have an account! <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include './footer.php' ?>