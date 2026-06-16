<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            
            <h1>Bine ai revenit!</h1>
            <p>Conectează-te la contul tău</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="auth-error">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>
        <?php if(session('status')): ?>
            <div style="background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; text-align: center; font-size: 0.9rem;">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <form method="POST" action="/login" class="auth-form">
            <?php echo csrf_field(); ?>

            <div class="auth-field">
                <label><i class="fa-solid fa-envelope" ></i> Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="email@exemplu.com"
                    value="<?php echo e(old('email')); ?>"
                    required
                >
            </div>

            <div class="auth-field">
                <label><i class="fa-solid fa-lock"></i> Parolă</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Parola ta"
                    required
                >
            </div>
            <div style="text-align: right; margin-top: -10px;" class="auth-switch" class="auth-switch a:hover">
            <a href="<?php echo e(route('password.request')); ?>" style="font-size: 0.8rem; color: #e91e8c;">
                Ai uitat parola?
            </a>
        </div>

            <button type="submit" class="auth-btn">
                Conectează-te
            </button>

        </form>

        <p class="auth-switch">
            Nu ai cont?
            <a href="<?php echo e(route('register')); ?>">Înregistrează-te</a>
        </p>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/auth/login.blade.php ENDPATH**/ ?>