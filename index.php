<?php
include_once './init.php';

if (!isset($_SESSION['auth'])) {
  redirect('login.php');
}

?>

<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container mt-5 text-center">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-5 text-secondary">
      <div class="card rounded-3 p-5" style="box-shadow: 0px 0px 20px rgb(0 0 0 / 30%);">
        <i class="bi bi-unlock-fill" style="font-size: 40px"></i>
        <h2 class="mt-3 text-secondary">You are logged in!</h2>
        <p class="mt-3">Username: <?php echo $_SESSION['auth']['name'] ?></p>
        <p>Email: <?php echo $_SESSION['auth']['email'] ?></p>
      </div>
    </div>
  </div>
</div>


<?php include './footer.php' ?>