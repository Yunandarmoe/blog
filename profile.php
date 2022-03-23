<?php
include_once './init.php';

if (!isset($_SESSION['auth'])) {
  redirect('login.php');
}
?>
<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container mt-5 mb-4 p-3 d-flex justify-content-center">
  <div class="card p-4" style="box-shadow: 0px 0px 20px rgb(0 0 0 / 30%);">
    <div class="card-body">
      <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" height="100" width="100" />
        <p class="mt-4">Name: <?php echo $_SESSION['auth']['name']; ?></p>
        <p>Email: <?php echo $_SESSION['auth']['email']; ?></p>
        <a href="/blog/profile-edit.php" class="mt-2 btn btn-dark">Edit Profile</a>
      </div>
    </div>
  </div>
</div>

<?php include './footer.php' ?>