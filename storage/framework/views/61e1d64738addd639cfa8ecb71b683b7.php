

<?php $__env->startSection('title', 'Produse'); ?>

<?php $__env->startSection('content'); ?>

<div class="admin-header">
    <h1>Produse</h1>
    <p>Gestionează meniul cafenelei</p>
</div>


<div class="admin-card">
    <h2>Adaugă Produs Nou</h2>
    <form method="POST" action="<?php echo e(route('admin.produse.adauga')); ?>" class="admin-form" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="admin-form-grid">
            <div class="admin-field">
                <label>Nume</label>
                <input type="text" name="nume" placeholder="Numele produsului" required>
            </div>
            <div class="admin-field">
                <label>Preț (lei)</label>
                <input type="number" name="pret" placeholder="0" step="0.01" required>
            </div>
            <div class="admin-field">
                <label>Categorie</label>
                <select name="categorie" required>
                    <option value="bauturi_calde">Băuturi Calde</option>
                    <option value="cocktailuri">Cocktailuri</option>
                    <option value="lemonades">Lemonades</option>
                    <option value="deserturi">Deserturi</option>
                    <option value="inghetata">Înghețată</option>
                </select>
            </div>
            <div class="admin-field">
                <label>Alergeni</label>
                <input type="text" name="alergeni" placeholder="ex: gluten, lapte">
            </div>
            <div class="admin-field admin-field-full">
                <label>Descriere</label>
                <input type="text" name="descriere" placeholder="Descriere scurtă">
            </div>
            <div class="admin-field admin-field-full">
                <label>Ingrediente</label>
                <input type="text" name="ingrediente" placeholder="Ingrediente principale">
            </div>
            <div class="admin-field admin-field-full">
                <label>Imagine Produs</label>              
                <small style="color: #666;">Formate acceptate: JPG, PNG, GIF, WebP (max 2MB)</small>
                <input type="file" id="imagine_produs" name="imagine" accept="image/jpeg, image/png, image/gif, image/webp" class="form-control">               
            </div>
        </div>
        <button type="submit" class="btn-adauga">
            <i class="fas fa-plus"></i> Adaugă Produs
        </button>
    </form>
</div>


<div class="admin-card">
    <h2>Produse Existente (<?php echo e($produse->count()); ?>)</h2>

    
    <table class="admin-table desktop-only">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagine</th>
                <th>Nume</th>
                <th>Preț</th>
                <th>Categorie</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $produse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($produs->id); ?></td>
                    <td>
                        <?php if($produs->imagine): ?>
                            <img src="<?php echo e(asset('images/' . $produs->imagine)); ?>" alt="<?php echo e($produs->nume); ?>" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                        <?php else: ?>
                            <span style="color: #999; font-size: 12px;">-</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($produs->nume); ?></td>
                    <td><?php echo e($produs->pret); ?> lei</td>
                    <td><span class="cat-badge"><?php echo e($produs->categorie); ?></span></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.produse.sterge', $produs->id)); ?>" onsubmit="return confirm('Ștergi produsul?')" style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-sterge">
                                <i class="fas fa-trash"></i> Șterge
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    
    <div class="mobile-only">
        <?php $__currentLoopData = $produse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mobile-card">
                <div class="mobile-card-header">
                    <span class="mobile-card-id">#<?php echo e($produs->id); ?></span>
                    <span class="cat-badge"><?php echo e($produs->categorie); ?></span>
                </div>

                <?php if($produs->imagine): ?>
                <div style="width: 100%; height: 150px; margin-bottom: 12px; border-radius: 6px; overflow: hidden;">
                    <img src="<?php echo e(asset('images/' . $produs->imagine)); ?>" alt="<?php echo e($produs->nume); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <?php endif; ?>

                <div class="mobile-card-body">
                    <div class="mobile-card-row">
                        <i class="fas fa-utensils"></i>
                        <span><strong><?php echo e($produs->nume); ?></strong></span>
                    </div>
                    <div class="mobile-card-row">
                        <i class="fas fa-tag"></i>
                        <span style="color:#e91e8c; font-weight:700"><?php echo e($produs->pret); ?> lei</span>
                    </div>
                    <?php if($produs->descriere): ?>
                        <div class="mobile-card-row">
                            <i class="fas fa-info-circle"></i>
                            <span><?php echo e($produs->descriere); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if($produs->alergeni): ?>
                        <div class="mobile-card-row">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span style="color:#b45309"><?php echo e($produs->alergeni); ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mobile-card-footer">
                    <form method="POST" action="<?php echo e(route('admin.produse.sterge', $produs->id)); ?>" onsubmit="return confirm('Ștergi produsul?')" style="width:100%">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn-sterge" style="width:100%">
                            <i class="fas fa-trash"></i> Șterge Produs
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/admin/produse.blade.php ENDPATH**/ ?>