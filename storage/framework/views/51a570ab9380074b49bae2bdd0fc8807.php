

<?php $__env->startSection('title', 'Forgot Password'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            
            <h1>Ai uitat parola?</h1>
            <p>Nu-ți face griji! Introdu adresa ta de email și îți vom trimite un link pentru a-ți reseta parola.</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="auth-error">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>
        
        <div class="auth-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
        </div>
        <button type="submit" class="auth-btn" style="margin-top: 20px; width: 100%;">
            Trimite link resetare
        </button>
    </form>

        <p class="auth-switch">
            Nu ai cont?
            <a href="<?php echo e(route('register')); ?>">Înregistrează-te</a>
        </p>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>