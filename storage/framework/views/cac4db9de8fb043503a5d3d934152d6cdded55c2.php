<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <i class="text-info fa fa-home"></i> <?php echo e(config('app.name', 'Laravel')); ?>

            </a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-auto ">
                <!-- Authentication Links -->
                <?php if(Auth::guest()): ?>
                    <li><a class="btn btn-link text-white" href="<?php echo e(route('login')); ?>"><span>Login</span></a></li>
                    <li><a class="btn btn-link text-white"
                           href="<?php echo e(route('register')); ?>"><span>Register</span></a>
                    </li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            Your Name
                            (Your Role)
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu p-3 pt-0" role="menu">

                            <li class="py-1">
                                <a href="<?php echo e(route('posts.index')); ?>"><i class="fa fa-pencil-square-o"></i> Posts</a>
                            </li>
                            <li class="py-1">
                                <a href="<?php echo e(route('categories.index')); ?>"><i class="fa fa-list-alt"></i> Categories</a>
                            </li>
                            <li class="py-1">
                                <a href="<?php echo e(route('tags.index')); ?>"><i class="fa fa-tags"></i> Tags</a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="py-1">
                                <a class="" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                      style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                    <?php if(isset($enableSearch) && $enableSearch==true): ?>
                        <form class="form-inline" name="searchForm" id="searchForm">
                            <input class="form-control mx-sm-2 form-control-sm" name="q" value="<?php echo e(request('q')); ?>"
                                   type="text"
                                   placeholder="Search">
                            <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
