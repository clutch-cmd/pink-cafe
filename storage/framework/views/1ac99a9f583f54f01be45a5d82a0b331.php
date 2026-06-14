<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Cafe - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="<?php echo e(request()->routeIs('home') ? 'home-page' : ''); ?>">

    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    

    <script>
        const btn = document.getElementById('navbarToggle');
        const links = document.getElementById('navbarLinks');
        if(btn) {
            btn.addEventListener('click', () => {
                links.classList.toggle('open');
            });
        }
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</body>
</html>
<?php /**PATH D:\pinkcafe\resources\views/layouts/app.blade.php ENDPATH**/ ?>