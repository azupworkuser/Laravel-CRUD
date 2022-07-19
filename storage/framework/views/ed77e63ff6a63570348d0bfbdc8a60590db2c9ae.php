<form action="<?php echo e(isset($route) ? $route : route('tags.store')); ?>" method="POST"  >
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="<?php echo e(isset($method) ? $method : 'POST'); ?>"/>
        <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control <?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" name="slug" id="slug" value="<?php echo e(old('slug',$model->slug)); ?>" placeholder="" maxlength="255" required="required" >
          <?php if($errors->has('slug')): ?>
    <div class="invalid-feedback">
        <strong><?php echo e($errors->first('slug')); ?></strong>
    </div>
  <?php endif; ?> 
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" id="name" value="<?php echo e(old('name',$model->name)); ?>" placeholder="" maxlength="150" >
          <?php if($errors->has('name')): ?>
    <div class="invalid-feedback">
        <strong><?php echo e($errors->first('name')); ?></strong>
    </div>
  <?php endif; ?> 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>