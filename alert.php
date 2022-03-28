<?php if(flash_has('success')): ?>
    <div class="col-12 mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo flash('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php if(flash_has('danger')): ?>
    <div class="col-12 mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo flash('danger'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php if(flash_has('info')): ?>
    <div class="col-12 mt-3">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo flash('info'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php if(flash_has('warning')): ?>
    <div class="col-12 mt-3">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo flash('warning'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>