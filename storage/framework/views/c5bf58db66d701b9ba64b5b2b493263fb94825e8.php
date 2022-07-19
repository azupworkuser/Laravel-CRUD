<?php if (!empty(session('app_error'))): ?>
<div class="alert alert-danger alert-dismissable p-2 px-4" role="alert"
     id="app_error"><?php echo e(session('app_error')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
        <!-- check for flash message -->
<?php if(empty(session('app_error')) && !empty(session('app_message'))): ?>
    <div class="alert alert-success alert-dismissable p-2 px-4" role="alert"
         id="app_message"><?php echo e(session('app_message')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (!empty(session('status'))): ?>
<div class="alert alert-info alert-dismissable p-2 px-4" role="alert" id="app_error"><?php echo e(session('status')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
        <!-- check for flash warning message -->
<?php if(!empty(session('app_warning'))): ?>
    <div class="alert alert-warning alert-dismissable p-2 px-4" role="alert" id="app_warning">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <?php echo e(session('app_warning')); ?>

    </div>
    <?php endif; ?><!-- check for flash info message -->
    <?php if(!empty(session('app_info'))): ?>
        <div class="alert alert-info alert-dismissable p-2 px-4" role="alert" id="app_info">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <?php echo e(session('app_info')); ?>

        </div>
    <?php endif; ?>

