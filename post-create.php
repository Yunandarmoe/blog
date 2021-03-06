<?php

include_once './init.php';

include app_path('middleware/auth.php');

?>

<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Create Post</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo url('post-store.php'); ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Post title</label>
                            <input type="text" name="title" class="form-control <?php if ($errors->has('title')) : ?> is-invalid <?php endif; ?>" placeholder="Enter Title" />
                            <?php if ($errors->has('title')) : ?>
                                <div class="invalid-feedback"><?php echo $errors->get('title'); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Write your post</label>
                            <textarea class="form-control <?php if ($errors->has('body')) : ?> is-invalid <?php endif; ?>" rows="5" name="body"></textarea>
                            <?php if ($errors->has('body')) : ?>
                                <div class="invalid-feedback"><?php echo $errors->get('body'); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary ">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php' ?>