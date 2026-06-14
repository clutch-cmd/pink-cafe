

<?php $__env->startSection('title', 'Resetare Parolă'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <h1>Setează o nouă parolă</h1>
            <p>Introdu noua ta parolă mai jos pentru a o schimba.</p>
        </div>
        <?php if($errors->any()): ?>
            <div class="auth-error">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('password.store')); ?>" class="auth-form">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

            <div class="auth-field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email', $request->email)); ?>" required readonly>
            </div>

            <div class="auth-field">
                <label for="password">Noua parolă</label>
                <input id="password" type="password" name="password" required autofocus>
            </div>

            <div class="auth-field">
                <label for="password_confirmation">Confirmă noua parolă</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="auth-btn">
                Salvează noua parolă
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>