

<?php $__env->startSection('title', 'Contul meu'); ?>

<?php $__env->startSection('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/cont-comezi.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="cont-wrapper">

    <div class="cont-layout">

        
        <aside class="cont-sidebar">
            <div class="cont-sidebar-title">Contul Meu</div>

            <a href="#panou" class="cont-nav-link">
                <i class="fa-solid fa-gauge"></i> Panou control
            </a>
            <a href="#comenzi" class="cont-nav-link">
                <i class="fa-solid fa-bag-shopping"></i> Comenzi
            </a>
            <a href="#favorite" class="cont-nav-link">
                <i class="fa-solid fa-heart"></i> Favorite
            </a>
            <a href="#detalii-cont" class="cont-nav-link">
                <i class="fa-solid fa-user-pen"></i> Detalii cont
            </a>

            <div class="cont-nav-divider"></div>

            <form method="POST" action="<?php echo e(route('logout')); ?>" class="cont-nav-form">
                <?php echo csrf_field(); ?>
                <button type="submit" class="cont-nav-link logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare
                </button>
            </form>
        </aside>

        
        <div class="cont-content">

    
    <?php if(session('success')): ?>
        <div class="cont-msg cont-msg-success"><i class="fa-solid fa-check-circle"></i> <?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="cont-msg cont-msg-error"><i class="fa-solid fa-exclamation-circle"></i> <?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if(session('success_fav')): ?>
        <div class="cont-msg cont-msg-success"><i class="fa-solid fa-heart"></i> <?php echo e(session('success_fav')); ?></div>
    <?php endif; ?>

    
    <?php
        $totalComenzi = $comenzi->count();
        $comenziActive = $comenzi->whereIn('status', ['noua', 'in_procesare'])->count();
        $comenziLivrate = $comenzi->where('status', 'livrata')->count();
        $totalFavorite = Auth::user()->favorite()->count();
    ?>

    <div class="cont-hero" id="panou">
        <div class="cont-hero-content">
            <div class="cont-greeting-row">
                <div class="cont-avatar"><?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?></div>
                <h1 class="cont-greeting">
                    <span class="cont-greeting-emoji"><i class="fa-solid fa-mug-saucer"></i></span>
                    Salut, <?php echo e(Auth::user()->name); ?>

                </h1>
            </div>
            <p class="cont-sub">Bine ai revenit la PINK CAFÉ — iată un sumar al activității tale.</p>
            <div class="cont-stats">
                <div class="cont-stat">
                    <span class="cont-stat-nr"><?php echo e($totalComenzi); ?></span>
                    <span class="cont-stat-label">Comenzi</span>
                </div>
                <div class="cont-stat">
                    <span class="cont-stat-nr"><?php echo e($comenziActive); ?></span>
                    <span class="cont-stat-label">Active</span>
                </div>
                <div class="cont-stat">
                    <span class="cont-stat-nr"><?php echo e($comenziLivrate); ?></span>
                    <span class="cont-stat-label">Livrate</span>
                </div>
                <div class="cont-stat">
                    <span class="cont-stat-nr"><?php echo e($totalFavorite); ?></span>
                    <span class="cont-stat-label">Favorite</span>
                </div>
            </div>
        </div>
    </div>

    
    <?php $favorite = Auth::user()->favorite; ?>
    <div class="cont-section" id="favorite">
        <div class="cont-section-header">
            <h2 class="cont-section-title">
                <span class="icon icon-pink"><i class="fa-solid fa-heart"></i></span>
                Preferatele tale
            </h2>
        </div>

        <?php if($favorite->isNotEmpty()): ?>
        <div class="fav-scroll">
            <?php $__currentLoopData = $favorite; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="fav-card">
                <a href="<?php echo e(route('produs.show', $produs->id)); ?>">
                    <?php if($produs->imagine): ?>
                        <img src="<?php echo e(asset('images/' . $produs->imagine)); ?>" alt="<?php echo e($produs->nume); ?>" class="fav-img">
                    <?php else: ?>
                        <div class="fav-fallback">
                            <?php if($produs->categorie == 'bauturi_calde'): ?> <i class="fa-solid fa-mug-saucer"></i>
                            <?php elseif($produs->categorie == 'cocktailuri'): ?> <i class="fa-solid fa-glass-martini-alt"></i>
                            <?php elseif($produs->categorie == 'lemonades'): ?> <i class="fa-solid fa-droplet"></i>
                            <?php elseif($produs->categorie == 'deserturi'): ?> <i class="fa-solid fa-cake-candles"></i>
                            <?php else: ?> <i class="fa-solid fa-ice-cream"></i>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </a>
                <form method="POST" action="<?php echo e(route('favorite.sterge', $produs->id)); ?>">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="fav-del" title="Elimină"><i class="fa-solid fa-xmark"></i></button>
                </form>
                <div class="fav-body">
                    <a href="<?php echo e(route('produs.show', $produs->id)); ?>" class="fav-name"><?php echo e($produs->nume); ?></a>
                    <div class="fav-price"><?php echo e(number_format($produs->pret, 0)); ?> lei</div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="cont-empty">
            <div class="cont-empty-icon"><i class="fa-solid fa-heart"></i></div>
            <h3>Nicio preferință încă</h3>
            <p>Adaugă produse la favorite pentru a le găsi rapid aici.</p>
            <a href="<?php echo e(route('meniu')); ?>" class="cont-empty-btn">
                <i class="fa-solid fa-arrow-right"></i> Vezi meniul
            </a>
        </div>
        <?php endif; ?>
    </div>

    
    <div class="cont-section" id="comenzi">
        <div class="cont-section-header">
            <h2 class="cont-section-title">
                <span class="icon icon-coral"><i class="fa-solid fa-timeline"></i></span>
                Istoric comenzi
            </h2>
        </div>

        <?php if($comenzi->isEmpty()): ?>
            <div class="cont-empty">
                <div class="cont-empty-icon"><i class="fa-solid fa-mug-saucer"></i></div>
                <h3>Încă nici o comandă</h3>
                <p>Pare că nu ai comandat încă. Hai să începem cu ceva delicios!</p>
                <a href="<?php echo e(route('comanda')); ?>" class="cont-empty-btn">
                    <i class="fa-solid fa-arrow-right"></i> Comandă acum
                </a>
            </div>
        <?php else: ?>
            <div class="timeline">
                <?php $__currentLoopData = $comenzi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comanda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tl-item">
                    <div class="tl-dot tl-dot-<?php echo e($comanda->status); ?>"></div>
                    <div class="tl-card">
                        <div class="tl-head">
                            <div>
                                <span class="tl-id">Comanda #<?php echo e($comanda->id); ?></span>
                                <span class="tl-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <?php echo e($comanda->created_at->format('d M Y, H:i')); ?>

                                </span>
                            </div>
                            <span class="tl-badge tl-badge-<?php echo e($comanda->status); ?>">
                                <?php switch($comanda->status):
                                    case ('noua'): ?> <i class="fas fa-clock"></i> Nouă <?php break; ?>
                                    <?php case ('in_procesare'): ?> <i class="fas fa-cogs"></i> În procesare <?php break; ?>
                                    <?php case ('livrata'): ?> <i class="fas fa-check-circle"></i> Livrată <?php break; ?>
                                    <?php case ('anulata'): ?> <i class="fas fa-times-circle"></i> Anulată <?php break; ?>
                                    <?php default: ?> <?php echo e($comanda->status); ?>

                                <?php endswitch; ?>
                            </span>
                        </div>

                        <div class="tl-details">
                            <?php if($comanda->data_rezervare): ?>
                            <span class="tl-detail">
                                <i class="fas fa-calendar-day"></i>
                                <?php echo e($comanda->data_rezervare instanceof \Carbon\Carbon ? $comanda->data_rezervare->format('d.m.Y') : $comanda->data_rezervare); ?>

                            </span>
                            <?php endif; ?>
                            <?php if($comanda->ora_rezervare): ?>
                            <span class="tl-detail">
                                <i class="fas fa-clock"></i> <?php echo e($comanda->ora_rezervare); ?>

                            </span>
                            <?php endif; ?>
                            <?php if($comanda->numar_persoane): ?>
                            <span class="tl-detail">
                                <i class="fas fa-users"></i> <?php echo e($comanda->numar_persoane); ?> pers.
                            </span>
                            <?php endif; ?>
                            <?php if($comanda->mentiuni): ?>
                            <span class="tl-detail">
                                <i class="fas fa-comment"></i> <?php echo e($comanda->mentiuni); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="tl-products">
                            <?php $__currentLoopData = $comanda->produse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tl-prod">
                                <span class="tl-prod-name">
                                    <?php echo e($produs->nume); ?>

                                    <span style="color:#999;">×<?php echo e($produs->pivot->cantitate); ?></span>
                                </span>
                                <span class="tl-prod-price"><?php echo e(number_format($produs->pivot->pret * $produs->pivot->cantitate, 2)); ?> lei</span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="tl-total">Total: <?php echo e(number_format($comanda->total, 2)); ?> lei</div>

                        <?php if($comanda->status !== 'livrata' && $comanda->status !== 'anulata' && $comanda->status !== 'finalizata'): ?>
                        <div class="tl-action">
                            <form method="POST" action="<?php echo e(route('cont.anuleaza', $comanda->id)); ?>" onsubmit="return confirm('Ești sigur că vrei să anulezi această comandă?')">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn-cancel"><i class="fa-solid fa-ban"></i> Anulează comanda</button>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="cont-section" id="detalii-cont">
        <div class="cont-section-header">
            <h2 class="cont-section-title">
                <span class="icon icon-purple"><i class="fa-solid fa-user-pen"></i></span>
                Detalii cont
            </h2>
        </div>

        <div class="cont-form-card">
            <form method="POST" action="<?php echo e(route('cont.actualizeaza')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="cont-form-grid">
                    <div class="cont-form-group">
                        <label for="name">Nume afișat</label>
                        <input type="text" id="name" name="name" value="<?php echo e(old('name', Auth::user()->name)); ?>" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="cont-form-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="cont-form-group">
                        <label for="email">Adresă email</label>
                        <input type="email" id="email" name="email" value="<?php echo e(old('email', Auth::user()->email)); ?>" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="cont-form-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="cont-form-divider">Schimbare parolă</div>

                <div class="cont-form-grid">
                    <div class="cont-form-group full">
                        <label for="current_password">Parola actuală</label>
                        <input type="password" id="current_password" name="current_password" autocomplete="current-password">
                        <span class="cont-form-hint">Lasă gol dacă nu vrei să schimbi parola</span>
                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="cont-form-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="cont-form-group">
                        <label for="password">Parolă nouă</label>
                        <input type="password" id="password" name="password" autocomplete="new-password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="cont-form-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="cont-form-group">
                        <label for="password_confirmation">Confirmă parola nouă</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="btn-save-cont">
                    <i class="fa-solid fa-floppy-disk"></i> Salvează modificările
                </button>
            </form>
        </div>
    </div>

        </div>
        

    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/cont-comenzi.blade.php ENDPATH**/ ?>