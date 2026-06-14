

<?php $__env->startSection('title', 'Meniu'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/meniu.css')); ?>?v=<?php echo e(time()); ?>">
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="meniu-page">

    <div class="meniu-header">
        <h1>Meniul Nostru</h1>
        <p>Descoperă gama noastră variată de băuturi și deserturi delicioase</p>
    </div>

    
    <div class="meniu-layout">

        
        <aside class="filter-sidebar">
            <div class="filter-sidebar-title">Categorii</div>

            <button class="filter-btn active" data-cat="all" onclick="filterCategory('all', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-utensils"></i> Toate</span>
                <span class="filter-btn-count"><?php echo e($bauturiCalde->count() + $cocktailuri->count() + $lemonades->count() + $deserturi->count() + $inghetata->count() + $sandvisuri->count()); ?></span>
            </button>

            <button class="filter-btn" data-cat="bauturi_calde" onclick="filterCategory('bauturi_calde', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-mug-saucer"></i> Băuturi Calde</span>
                <span class="filter-btn-count"><?php echo e($bauturiCalde->count()); ?></span>
            </button>

            <button class="filter-btn" data-cat="cocktailuri" onclick="filterCategory('cocktailuri', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-glass-martini-alt"></i> Cocktailuri</span>
                <span class="filter-btn-count"><?php echo e($cocktailuri->count()); ?></span>
            </button>

            <button class="filter-btn" data-cat="lemonades" onclick="filterCategory('lemonades', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-droplet"></i> Lemonades</span>
                <span class="filter-btn-count"><?php echo e($lemonades->count()); ?></span>
            </button>

            <button class="filter-btn" data-cat="deserturi" onclick="filterCategory('deserturi', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-cake-candles"></i> Deserturi</span>
                <span class="filter-btn-count"><?php echo e($deserturi->count()); ?></span>
            </button>

            <button class="filter-btn" data-cat="inghetata" onclick="filterCategory('inghetata', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-ice-cream"></i> Înghețată</span>
                <span class="filter-btn-count"><?php echo e($inghetata->count()); ?></span>
            </button>

            <button class="filter-btn" data-cat="sandvisuri_burgere" onclick="filterCategory('sandvisuri_burgere', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-burger"></i> Sandvișuri & Burgere</span>
                <span class="filter-btn-count"><?php echo e($sandvisuri->count()); ?></span>
            </button>
        </aside>

        
        <div class="meniu-content">

    
    <div class="meniu-section" data-category="bauturi_calde">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-mug-saucer"></i></span> Băuturi Calde
        </h2>
        <div class="meniu-grid">
            <?php $__currentLoopData = $bauturiCalde; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('produs.show', $produs->id)); ?>" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name"><?php echo $produs->nume; ?></span>
                        <span class="meniu-item-desc"><?php echo e($produs->descriere); ?></span>
                        
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret"><?php echo e(number_format($produs->pret, 0)); ?> lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="meniu-section" data-category="cocktailuri">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-glass-martini-alt"></i></span> Cocktailuri
        </h2>
        <div class="meniu-grid">
            <?php $__currentLoopData = $cocktailuri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('produs.show', $produs->id)); ?>" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name"><?php echo $produs->nume; ?></span>
                        <span class="meniu-item-desc"><?php echo e($produs->descriere); ?></span>
                       
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret"><?php echo e(number_format($produs->pret, 0)); ?> lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="meniu-section" data-category="lemonades">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-droplet"></i></span> Fresh Lemonades
        </h2>
        <div class="meniu-grid">
            <?php $__currentLoopData = $lemonades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('produs.show', $produs->id)); ?>" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name"><?php echo $produs->nume; ?></span>
                        <span class="meniu-item-desc"><?php echo e($produs->descriere); ?></span>
                        
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret"><?php echo e(number_format($produs->pret, 0)); ?> lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="meniu-section" data-category="deserturi">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-cake-candles"></i></span> Deserturi
        </h2>
        <div class="meniu-grid meniu-grid-2">
            <?php $__currentLoopData = $deserturi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('produs.show', $produs->id)); ?>" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name"><?php echo $produs->nume; ?></span>
                        <span class="meniu-item-desc"><?php echo e($produs->descriere); ?></span>
                        
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret"><?php echo e(number_format($produs->pret, 0)); ?> lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="meniu-section" data-category="sandvisuri_burgere">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-burger"></i></span> Sandvișuri & Burgere
        </h2>
        <div class="meniu-grid meniu-grid-2">
            <?php $__currentLoopData = $sandvisuri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="meniu-item-wrapper">
                    <a href="<?php echo e(route('produs.show', $produs->id)); ?>" class="meniu-item meniu-item-desert">
                        <div class="meniu-item-desert-info">
                            <span class="meniu-item-name"><?php echo $produs->nume; ?></span>
                            <span class="meniu-item-desc"><?php echo e($produs->descriere); ?></span>
                            
                        </div>
                        <div class="meniu-item-right">
                            <span class="meniu-item-pret"><?php echo e(number_format($produs->pret, 0)); ?> lei</span>
                            <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                        </div>
                    </a>
                    <?php if(auth()->guard()->check()): ?>
                        <form method="POST" action="<?php echo e(route('favorite.toggle', $produs->id)); ?>" class="fav-form">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="fav-btn <?php echo e(Auth::user()->favorite->contains($produs->id) ? 'fav-active' : ''); ?>">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="meniu-section" data-category="inghetata">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-ice-cream"></i></span> Înghețată
        </h2>
        <div class="meniu-grid">
            <?php $__currentLoopData = $inghetata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('produs.show', $produs->id)); ?>" class="meniu-item meniu-item-desert">
                        <div class="meniu-item-desert-info">
                            <span class="meniu-item-name"><?php echo $produs->nume; ?></span>
                            <span class="meniu-item-desc"><?php echo e($produs->descriere); ?></span>
                           
                        </div>
                        <div class="meniu-item-right">
                            <span class="meniu-item-pret"><?php echo e(number_format($produs->pret, 0)); ?> lei</span>
                            <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                        </div>
                    </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

        </div>
        

    </div>
    

</div>

<script>
function filterCategory(category, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    document.querySelectorAll('.meniu-section').forEach(section => {
        const cat = section.getAttribute('data-category');
        if (category === 'all' || cat === category) {
            section.classList.remove('hidden-cat');
            section.style.opacity = '1';
        } else {
            section.classList.add('hidden-cat');
            section.style.opacity = '0';
        }
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/meniu.blade.php ENDPATH**/ ?>