<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#"><?php echo e($page ?? ''); ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link text-primary">
                        <i class="tim-icons icon-minimal-left"></i> Home
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo e(route('register')); ?>" class="nav-link">
                        <i class="tim-icons icon-laptop"></i> Register
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo e(route('login')); ?>" class="nav-link">
                        <i class="tim-icons icon-single-02"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\New folder (3)\laravel-inventory\resources\views/layouts/navbars/navs/guest.blade.php ENDPATH**/ ?>