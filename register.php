<?php

include_once './init.php';

$errors = new ErrorBag;
$errorname = $errors->put('name', 'The name is required');
$erroremail = $errors->put('email', 'The email is required');
$errorpassword = $errors->put('password', 'The password is required');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (!$name) {
       $errorname = $errors->get('name');
    }
    if (!$email) {
        $erroremail = $errors->get('email');
    }
    if (!$password) {
        $errorpassword = $errors->get('password');
    }

    if ($name && $email && $password) {
        $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
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
                            <input type="text" name="name" class="form-control">
                            <?php if ($errors->has('name')) : ?>
                                <div class="error mt-2" style="color: #DC3545;"><?php echo $errorname; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                            <?php if ($errors->has('email')) : ?>
                                <div class="error mt-2" style="color: #DC3545;"><?php echo $erroremail; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            <?php if ($errors->has('password')) : ?>
                                <div class="error mt-2" style="color: #DC3545;"><?php echo $errorpassword; ?></div>
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