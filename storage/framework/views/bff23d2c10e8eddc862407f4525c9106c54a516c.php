<form action="<?php echo e(isset($route) ? $route : route('categories.store')); ?>" method="POST"  >
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="<?php echo e(isset($method) ? $method : 'POST'); ?>"/>
        <div class="form-group">
        <label for="parent_id">Parent Id</label>
        <input type="text" class="form-control <?php echo e($errors->has('parent_id') ? ' is-invalid' : ''); ?>" name="parent_id" id="parent_id" value="<?php echo e(old('parent_id',$model->parent_id)); ?>" placeholder="" maxlength="255" >
          <?php if($errors->has('parent_id')): ?>
    <div class="invalid-feedback">
        <strong><?php echo e($errors->first('parent_id')); ?></strong>
    </div>
  <?php endif; ?> 
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" name="title" id="title" value="<?php echo e(old('title',$model->title)); ?>" placeholder="" maxlength="255" >
          <?php if($errors->has('title')): ?>
    <div class="invalid-feedback">
        <strong><?php echo e($errors->first('title')); ?></strong>
    </div>
  <?php endif; ?> 
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control <?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" name="slug" id="slug" value="<?php echo e(old('slug',$model->slug)); ?>" placeholder="" maxlength="255" required="required" >
          <?php if($errors->has('slug')): ?>
    <div class="invalid-feedback">
        <strong><?php echo e($errors->first('slug')); ?></strong>
    </div>
  <?php endif; ?> 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>