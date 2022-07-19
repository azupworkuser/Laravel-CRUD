<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a href="<?php echo e(route('posts.index')); ?>">posts</a>
</li>
<li>
    Create
</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class='col-md-12'>
        <div class='card bg-white'>
            <div class="card-body">
                <?php echo $__env->make('forms.post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laracrud.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>