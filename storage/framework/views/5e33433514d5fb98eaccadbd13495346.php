

<?php $__env->startSection('title', 'Comenzi'); ?>

<?php $__env->startSection('content'); ?>

<div class="admin-header">
    <h1>Comenzi</h1>
    <p>Gestionează toate comenzile</p>
</div>

<div class="admin-card">

    
    <table class="admin-table desktop-only">
        <thead>
    <tr>
        <th>#</th>
        <th>Nume</th>
        <th>Telefon</th>
        <th>Adresă</th>
        <th>Total</th>
        <th>Data Rezervare</th>
        <th>Ora</th>
        <th>Mențiuni</th>
        <th>Status</th>
        <th>Data</th>
        <th>Acțiuni</th>
    </tr>
</thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $comenzi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comanda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($comanda->id); ?></td>
                    <td><?php echo e($comanda->nume); ?></td>
                    <td><?php echo e($comanda->telefon); ?></td>
                    <td><?php echo e($comanda->adresa); ?></td>
                    <td><?php echo e($comanda->total); ?> lei</td>
                    <td><?php echo e($comanda->data_rezervare ?? '—'); ?></td>
                    <td><?php echo e($comanda->ora_rezervare ?? '—'); ?></td>
                    <td><?php echo e($comanda->mentiuni ?? '—'); ?></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.comenzi.status', $comanda->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <select name="status" onchange="this.form.submit()" class="status-select status-<?php echo e($comanda->status); ?>">
                                <option value="noua" <?php echo e($comanda->status == 'noua' ? 'selected' : ''); ?>>Nouă</option>
                                <option value="in_procesare" <?php echo e($comanda->status == 'in_procesare' ? 'selected' : ''); ?>>În procesare</option>
                                <option value="livrata" <?php echo e($comanda->status == 'livrata' ? 'selected' : ''); ?>>Livrată</option>
                                <option value="anulata" <?php echo e($comanda->status == 'anulata' ? 'selected' : ''); ?>>Anulată</option>
                            </select>
                        </form>
                    </td>
                    <td><?php echo e($comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A'); ?></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.comenzi.sterge', $comanda->id)); ?>" onsubmit="return confirm('Ștergi comanda?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-sterge">
                                <i class="fas fa-trash"></i> Șterge
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="8" class="text-center">Nu există comenzi</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    
    <div class="mobile-only">
        <?php $__empty_1 = true; $__currentLoopData = $comenzi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comanda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo e($comanda->adresa); ?></span>
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

                    <?php if($comanda->comentarii): ?>
                        <div class="mobile-card-row">
                            <i class="fas fa-comment"></i>
                            <span><?php echo e($comanda->comentarii); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="mobile-card-row">
                        <i class="fas fa-history"></i>
                        <span><?php echo e($comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A'); ?></span>
                    </div>
                </div>

                

                <div class="mobile-card-footer">
                    <form method="POST" action="<?php echo e(route('admin.comenzi.status', $comanda->id)); ?>" style="flex:1">
                        <?php echo csrf_field(); ?>
                        <select name="status" onchange="this.form.submit()" class="status-select-mobile">
                            <option value="noua" <?php echo e($comanda->status == 'noua' ? 'selected' : ''); ?>>Nouă</option>
                            <option value="in_procesare" <?php echo e($comanda->status == 'in_procesare' ? 'selected' : ''); ?>>În procesare</option>
                            <option value="livrata" <?php echo e($comanda->status == 'livrata' ? 'selected' : ''); ?>>Livrată</option>
                            <option value="anulata" <?php echo e($comanda->status == 'anulata' ? 'selected' : ''); ?>>Anulată</option>
                        </select>
                    </form>
                    <form method="POST" action="<?php echo e(route('admin.comenzi.sterge', $comanda->id)); ?>" onsubmit="return confirm('Ștergi comanda?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn-sterge-mobile">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="mobile-empty">
                <i class="fas fa-inbox"></i>
                <p>Nu există comenzi</p>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/admin/comenzi.blade.php ENDPATH**/ ?>