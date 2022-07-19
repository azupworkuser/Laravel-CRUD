<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('laracrud/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('laracrud/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('styles'); ?>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
<div id="app">
    <?php echo $__env->make('laracrud.includes.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(auth()->check()): ?>
        <nav aria-label="breadcrumb" role="navigation" class="container">
            <ol class="breadcrumb mb-1" style="font-size: 14px;font-weight: 400;margin: auto">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <?php echo $__env->yieldContent('breadcrumb'); ?>
                <?php if(!empty(request('q'))): ?>
                    <li class="breadcrumb-item">
                        <span class="text-muted">Showing result with keyword <b><?php echo e(request('q')); ?></b></span>
                        <button class="btn btn-none p-0 m-0" id="searchCleaner"><i
                                    class="text-danger fa fa-remove"></i>
                        </button>
                    </li>
                <?php endif; ?>
                <li class="pull-right"><?php echo $__env->yieldContent('tools'); ?></li>
            </ol>
        </nav>
    <?php endif; ?>

    <div class="container">
        <?php echo $__env->make('laracrud.includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<!-- Scripts -->

<script src="<?php echo e(asset('laracrud/js/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('laracrud/js/bootstrap.bundle.min.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $("#searchCleaner").on('click', function (e) {
        e.preventDefault();
        $("input[name=q]").val('');
        $("#searchForm").submit();
    });
</script>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
