<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            
            <p>Înregistrează-te pentru a comanda online</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="auth-error">
                <i class="fa-solid fa-circle-exclamation"></i> <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="/register" class="auth-form">
            <?php echo csrf_field(); ?>

            <div class="auth-field">
                <label><i class="fa-solid fa-user"></i> Nume complet</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Numele tău"
                    value="<?php echo e(old('name')); ?>"
                    required
                >
            </div>

            <div class="auth-field">
                <label><i class="fa-solid fa-envelope"></i> Email</label>
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
                    placeholder="Minim 6 caractere"
                    required
                >
            </div>

            <div class="auth-field">
                <label><i class="fa-solid fa-shield-halved"></i> Confirmă parola</label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Repetă parola"
                    required
                >
            </div>

            <button type="submit" class="auth-btn">
                Înregistrează-te
            </button>

        </form>

        <p class="auth-switch">
            Ai deja cont?
            <a href="<?php echo e(route('login')); ?>">Conectează-te</a>
        </p>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/auth/register.blade.php ENDPATH**/ ?>