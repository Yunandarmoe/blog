<?php

include_once './init.php';

include app_path('middleware/auth.php');

if (!isset($_GET['post_id'])) {
    redirect('index.php');
}

$id = $_GET['post_id'];
$sql = "SELECT * FROM posts WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);
?>

<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Post</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo url('post-update.php'); ?>" method="POST">
                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="<?php echo $post['title']; ?>" class="form-control <?php if (isset($_SESSION['errors']['title'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter Title" />
                            <?php if (isset($_SESSION['errors']['title'])) : ?>
                                <div class="invalid-feedback"><?php echo $_SESSION['errors']['title']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea class="form-control <?php if (isset($_SESSION['errors']['body'])) : ?> is-invalid <?php endif; ?>" rows="5" name="body">
                <?php echo $post['title']; ?>
              </textarea>
                            <?php if (isset($_SESSION['errors']['body'])) : ?>
                                <div class="invalid-feedback"><?php echo $_SESSION['errors']['body']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php' ?>