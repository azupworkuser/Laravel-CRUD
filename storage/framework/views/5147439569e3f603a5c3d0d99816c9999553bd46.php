<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item">
        posts
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tools'); ?>
    <a href="<?php echo e(route('posts.create')); ?>">
        <span class="fa fa-plus"></span> posts
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6">
                <?php echo $__env->make('cards.post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php echo $records->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('laracrud.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>