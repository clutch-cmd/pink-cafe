

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="admin-header">
    <h1>Dashboard</h1>
    <p>Bun venit în panelul de administrare PINK CAFÉ!</p>
</div>

<div class="admin-stats">
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-list"></i></div>
        <div class="stat-info">
            <span class="stat-number"><?php echo e($totalComenzi); ?></span>
            <span class="stat-label">Total Comenzi</span>
        </div>
    </div>
    <div class="stat-card stat-pink">
        <div class="stat-icon"><i class="fas fa-bell"></i></div>
        <div class="stat-info">
            <span class="stat-number"><?php echo e($comenziNoi); ?></span>
            <span class="stat-label">Comenzi Noi</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-money-bill"></i></div>
        <div class="stat-info">
            <span class="stat-number"><?php echo e(number_format($totalVanzari, 0)); ?> lei</span>
            <span class="stat-label">Total Vânzări</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-utensils"></i></div>
        <div class="stat-info">
            <span class="stat-number"><?php echo e($totalProduse); ?></span>
            <span class="stat-label">Produse</span>
        </div>
    </div>
</div>


<div class="admin-card">
    <h2>Ultimele Comenzi</h2>

    <table class="admin-table desktop-only">
        <thead>
    <tr>
        <th>#</th>
        <th>Nume</th>
        <th>Telefon</th>
        <th>Total</th>
        <th>Data Rezervare</th>
        <th>Ora</th>
        <th>Mențiuni</th>
        <th>Status</th>
        <th>Data</th>
    </tr>
</thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $ultimeleComenzi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comanda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($comanda->id); ?></td>
                    <td><?php echo e($comanda->nume); ?></td>
                    <td><?php echo e($comanda->telefon); ?></td>
                    <td><?php echo e($comanda->total); ?> lei</td>
                    <td><?php echo e($comanda->data_rezervare ?? '—'); ?></td>
                    <td><?php echo e($comanda->ora_rezervare ?? '—'); ?></td>
                    <td><?php echo e($comanda->mentiuni ?? '—'); ?></td>
                    <td>
                        <span class="status-badge status-<?php echo e($comanda->status); ?>">
                            <?php echo e($comanda->status == 'noua' ? 'Nouă' :
                               ($comanda->status == 'in_procesare' ? 'În procesare' :
                               ($comanda->status == 'livrata' ? 'Livrată' : 'Anulată'))); ?>

                        </span>
                    </td>
                    <td><?php echo e($comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="9" class="text-center">Nu există comenzi</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    
    <div class="mobile-only">
        <?php $__empty_1 = true; $__currentLoopData = $ultimeleComenzi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comanda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mobile-card">
                <div class="mobile-card-header">
                    <span class="mobile-card-id">#<?php echo e($comanda->id); ?></span>
                    <span class="status-badge status-<?php echo e($comanda->status); ?>">
                        <?php echo e($comanda->status == 'noua' ? 'Nouă' :
                           ($comanda->status == 'in_procesare' ? 'În procesare' :
                           ($comanda->status == 'livrata' ? 'Livrată' : 'Anulată'))); ?>

                    </span>
                </div>
               
                <div class="mobile-card-body">
                    <div class="mobile-card-row">
                        <i class="fas fa-user"></i>
                        <span><?php echo e($comanda->nume); ?></span>
                    </div>
                    <div class="mobile-card-row">
                        <i class="fas fa-phone"></i>
                        <span><?php echo e($comanda->telefon); ?></span>
                    </div>
                    <div class="mobile-card-row">
                        <i class="fas fa-money-bill"></i>
                        <span><strong><?php echo e($comanda->total); ?> lei</strong></span>
                    </div>
                     <?php if($comanda->data_rezervare): ?>
                    <div class="mobile-card-row">
                        <i class="fas fa-calendar-day"></i>
                        <span>Rezervare: <strong><?php echo e($comanda->data_rezervare); ?></strong></span>
                    </div>
                <?php endif; ?>

                <?php if($comanda->ora_rezervare): ?>
                    <div class="mobile-card-row">
                        <i class="fas fa-clock"></i>
                        <span>Ora: <strong><?php echo e($comanda->ora_rezervare); ?></strong></span>
                    </div>
                <?php endif; ?>

                <?php if($comanda->mentiuni): ?>
                    <div class="mobile-card-row">
                        <i class="fas fa-comment-dots"></i>
                        <span><?php echo e($comanda->mentiuni); ?></span>
                    </div>
                <?php endif; ?>
                    <div class="mobile-card-row">
                        <i class="fas fa-clock"></i>
                        <span><?php echo e($comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A'); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="mobile-empty">
                <i class="fas fa-inbox"></i>
                <p>Nu există comenzi</p>
            </div>
        <?php endif; ?>
    </div>

    <a href="<?php echo e(route('admin.comenzi')); ?>" class="btn-vezi-toate">
        <i class="fas fa-arrow-right"></i> Vezi toate comenzile
    </a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>