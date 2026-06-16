

<?php $__env->startSection('title', 'Comandă Plasată'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/comanda.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="succes-page">
    <div class="succes-card">

        <div class="succes-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        
        <h1>Comanda a fost plasată!</h1>
        <p>Îți mulțumim, <strong><?php echo e($comanda->nume); ?></strong>! Te vom contacta în scurt timp la <i class="fa-solid fa-phone-flip" style="font-size: 0.9em; margin-left: 5px;"></i> <strong><?php echo e($comanda->telefon); ?></strong>.</p>

        <div class="succes-detalii">
            <h3><i class="fa-solid fa-receipt"></i> Detalii comandă #<?php echo e($comanda->id); ?></h3>
            
            <?php $__currentLoopData = $comanda->produse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="succes-produs">
                    <span><i class="fa-solid fa-mug-hot" margin-right: 8px;"></i> <?php echo e($produs->nume); ?> × <?php echo e($produs->pivot->cantitate); ?></span>
                    <span><?php echo e($produs->pivot->pret * $produs->pivot->cantitate); ?> lei</span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="succes-total">
                <strong>Total: <?php echo e($comanda->total); ?> lei</strong>
            </div>
        </div>

        <div class="succes-footer-msg">
            <p><i class="fa-solid fa-truck-ramp-box"></i> Comanda ta este în curs de preparare!</p>
        </div>

        <a href="<?php echo e(route('home')); ?>" class="btn-acasa">
            <i class="fa-solid fa-house"></i> Înapoi la Home
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/comanda-succes.blade.php ENDPATH**/ ?>