<?php

include_once './init.php';

include app_path('middleware/auth.php');

$id = $_SESSION['auth']['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$errors = [];

$userObj = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $userObj->escape_string($_POST['name']);
    $password = $userObj->escape_string($_POST['password']);

    if (!$name) {
        $errors['name'] = 'The name is required.';
    }

    if (!$password) {
        $errors['password'] = 'The password is required.';
    }

    if (count($errors) == 0) {
        $sql = "UPDATE users SET `name`='$name', `password`='$password' where `id`='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $errors['success'] = 'Your changes have been successfully saved!';
        }
    }
}


?>
<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card mt-5" style="box-shadow: 0px 0px 20px rgb(0 0 0 / 30%);">
                <div class="card-body">
                    <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" height="100" width="100" />
                    <form method="POST" class="mt-3">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['auth']['id']; ?>">
                        <?php if (isset($errors['success'])) : ?>
                            <div class="alert alert-success" role="alert"><?php echo $errors['success']; ?></div>
                        <?php endif; ?>
                        <?php if (isset($errors['alert'])) : ?>
                            <div class="alert alert-warning" role="alert"><?php echo $errors['alert']; ?></div>
                        <?php endif; ?>
                        <div>
                            <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control <?php if (isset($errors['name'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter name">
                            <?php if (isset($errors['name'])) : ?>
                                <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-3">
                            <input type="password" name="password" class="form-control <?php if (isset($errors['password'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter password">
                            <?php if (isset($errors['password'])) : ?>
                                <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/blog/profile.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php' ?>