<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a href="<?php echo e(route('tags.index')); ?>">tags</a>
</li>
<li class="breadcrumb-item">
    <?php echo e($record->id); ?>

</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('tools'); ?>

<a href="<?php echo e('tags.create'); ?>">
    <span class="fa fa-plus"></span>
</a>
<a href="<?php echo e(route('tags.edit',$record->id)); ?>">
    <span class="fa fa-pencil"></span>
</a>
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="<?php echo e(route('tags.destroy',$record->id)); ?>"
      method="post"
      style="display: inline">
    <?php echo e(csrf_field()); ?>

    <?php echo e(method_field('DELETE')); ?>

    <button type="submit" class="btn btn-default cursor-pointer  btn-sm">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-8">
        <?php echo $__env->make('cards.tag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laracrud.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>