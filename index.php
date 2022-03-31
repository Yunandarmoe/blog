<?php
include_once './init.php';

include app_path('middleware/auth.php');

$sql = "SELECT posts.*, users.name as author FROM posts LEFT JOIN users ON users.id=posts.user_id";
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
  <div class="row">
    <?php include app_path('alert.php'); ?>
    <?php foreach ($posts as $post) : ?>
      <div class="col-6 mt-4">
        <a href="#" class="text-decoration-none text-black">
          <div class="card">
            <div class="card-body">
              <h3><?php echo $post['title']; ?></h3>
              <p><?php echo $post['body']; ?></p>
            </div>
            <div class="card-footer ">
              <small>Posted on <i><?php echo date('M d, Y', strtotime($post['date'])); ?></i> by
                <b>
                  <?php echo $post['author']; ?>
                </b>
              </small>
              <div class="float-end">
                <a href="<?php echo url('post-edit.php?post_id=' . $post['id']); ?>" class="btn btn-success">Edit</a>
                <a href="<?php echo url('post-delete.php?post_id=' . $post['id']); ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include './footer.php' ?>