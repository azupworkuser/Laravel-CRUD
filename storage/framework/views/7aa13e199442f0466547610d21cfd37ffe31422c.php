<form action="<?php echo e(isset($route) ? $route : route('posts.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="<?php echo e(isset($method) ? $method : 'POST'); ?>"/>
    <div class="form-group">
        <label for="user_id">User Id</label>
        <select class="form-control <?php echo e($errors->has('user_id') ? ' is-invalid' : ''); ?>" name="user_id" id="user_id">
            <?php if(isset($users)): ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </select>
        <?php if($errors->has('user_id')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('user_id')); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" name="title" id="title"
               value="<?php echo e(old('title',$model->title)); ?>" placeholder="" maxlength="255">
        <?php if($errors->has('title')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('title')); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control <?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" name="slug" id="slug"
               value="<?php echo e(old('slug',$model->slug)); ?>" placeholder="" maxlength="255">
        <?php if($errors->has('slug')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('slug')); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control <?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>" name="status" id="status">
            <option value="draft" <?php echo e(old('status',$model->status)=='draft'?"selected":""); ?> >Draft</option>
            <option value="published" <?php echo e(old('status',$model->status)=='published'?"selected":""); ?> >Published</option>
            <option value="canceled" <?php echo e(old('status',$model->status)=='canceled'?"selected":""); ?> >Canceled</option>

        </select>
        <?php if($errors->has('status')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('status')); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <input type="text" class="form-control <?php echo e($errors->has('body') ? ' is-invalid' : ''); ?>" name="body" id="body"
               value="<?php echo e(old('body',$model->body)); ?>" placeholder="">
        <?php if($errors->has('body')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('body')); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="category_id">Category Id</label>
        <select class="form-control <?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>" name="category_id"
                id="category_id">
            <?php if(isset($categories)): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </select>
        <?php if($errors->has('category_id')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('category_id')); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control <?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" name="image" id="image"
               placeholder="">
        <?php if($errors->has('image')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('image')); ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="published_at">Published At</label>
        <div class="input-group">
            <input type="datetime" class="form-control <?php echo e($errors->has('published_at') ? ' is-invalid' : ''); ?>"
                   name="published_at" id="published_at"
                   value="<?php echo e(old('published_at',$model->published_at)); ?>"
                   placeholder="Y-m-d H:i:s">
        </div>
        <?php if($errors->has('published_at')): ?>
            <div class="invalid-feedback">
                <strong><?php echo e($errors->first('published_at')); ?></strong>
            </div>
        <?php endif; ?>
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>