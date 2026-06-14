

<?php $__env->startSection('title', 'Contul meu'); ?>

<?php $__env->startSection('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
* {
    font-family: 'Inter', -apple-system, sans-serif;
}

.cont-wrapper {
    max-width: 1300px;
    margin: 0 auto;
    padding: 100px 24px 60px;
}

/* ===== LAYOUT CU SIDEBAR ===== */
.cont-layout {
    display: flex;
    gap: 30px;
    align-items: flex-start;
}

.cont-content {
    flex: 1;
    min-width: 0;
}

/* ===== SIDEBAR CONT ===== */
.cont-sidebar {
    width: 250px;
    flex-shrink: 0;
    position: sticky;
    top: 100px;
    background: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 16px;
    box-shadow: 0 0 30px 0px rgba(0, 0, 0, 0.08);
    padding: 22px 16px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.cont-sidebar-title {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    font-weight: 700;
    color: #1e1922;
    padding: 0 14px 14px;
    border-bottom: 1px solid rgba(233, 30, 140, 0.15);
    margin-bottom: 8px;
}

.cont-nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 14px;
    border-radius: 12px;
    color: #4a4a55;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.cont-nav-link i {
    color: #e91e8c;
    width: 18px;
    text-align: center;
    flex-shrink: 0;
}

.cont-nav-link:hover {
    background: rgba(233, 30, 140, 0.08);
    color: #be185d;
}

.cont-nav-link.active {
    background: linear-gradient(135deg, #e91e8c, #be185d);
    color: #fff;
    box-shadow: 0 6px 16px rgba(233, 30, 99, 0.3);
}

.cont-nav-link.active i {
    color: #fff;
}

.cont-nav-divider {
    height: 1px;
    background: rgba(233, 30, 140, 0.15);
    margin: 8px 6px;
}

.cont-nav-link.logout {
    color: #ef4444;
}

.cont-nav-link.logout i {
    color: #ef4444;
}

.cont-nav-link.logout:hover {
    background: #fef2f2;
}

.cont-nav-form {
    margin: 0;
}

.cont-nav-form button.cont-nav-link {
    width: 100%;
    border: none;
    background: none;
    cursor: pointer;
    font-family: inherit;
    text-align: left;
}

/* ===== HERO ===== */
.cont-hero {
    position: relative;
    background-image: linear-gradient(135deg, rgba(46, 38, 48, 0.82), rgba(46, 38, 48, 0.75)), url('/images/footer-bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 6px;
    padding: 48px 48px 56px;
    margin-bottom: 40px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.12);
}

.cont-hero::before {
    content: '';
    position: absolute;
    top: -60%;
    right: -20%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(233,30,99,.15) 0%, transparent 70%);
    border-radius: 50%;
}

.cont-hero::after {
    content: '';
    position: absolute;
    bottom: -40%;
    left: -10%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(156,39,176,.1) 0%, transparent 70%);
    border-radius: 50%;
}

.cont-hero-content {
    position: relative;
    z-index: 1;
}

.cont-greeting-row {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-bottom: 6px;
}

.cont-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f472b6, #db2777);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 700;
    color: #fff;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(219, 39, 119, 0.4);
    border: 2px solid rgba(255,255,255,.2);
}

.cont-greeting {
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: #f4cbdf;
    margin: 0;
    letter-spacing: -0.5px;
}

.cont-greeting-emoji {
    display: inline-block;
    margin-right: 4px;
}

.cont-sub {
    font-size: 0.95rem;
    color: rgba(255,255,255,.6);
    font-weight: 400;
    margin: 0 0 28px;
}

/* Stats row */
.cont-stats {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.cont-stat {
    background: rgba(255,255,255,.08);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 6px;
    padding: 14px 22px;
    min-width: 110px;
    text-align: center;
}

.cont-stat-nr {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
    color: #fff;
    line-height: 1.2;
}

.cont-stat-label {
    font-size: 0.75rem;
    color: rgba(255,255,255,.5);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 500;
}

/* ===== SECTIONS ===== */
.cont-section {
    margin-bottom: 44px;
    scroll-margin-top: 90px;
}

.cont-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.cont-section-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e1922;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.cont-section-title .icon {
    width: 32px;
    height: 32px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

.cont-section-title .icon-pink { background: #fce4ec; color: #e91e63; }
.cont-section-title .icon-coral { background: #fff3e0; color: #e65100; }
.cont-section-title .icon-purple { background: #f3e5f5; color: #8e24aa; }

/* ===== FAVORITE GRID ===== */
.fav-scroll {
    display: flex;
    gap: 14px;
    overflow-x: auto;
    padding-bottom: 8px;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
}

.fav-scroll::-webkit-scrollbar { height: 4px; }
.fav-scroll::-webkit-scrollbar-thumb { background: #e91e63; border-radius: 4px; }
.fav-scroll::-webkit-scrollbar-track { background: #f5f5f5; border-radius: 4px; }

.fav-card {
    flex: 0 0 180px;
    scroll-snap-align: start;
    background: rgba(255, 255, 255, 0.705);
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,.05);
    position: relative;
}

.fav-card:hover {
    box-shadow: 0 12px 32px rgba(233,30,99,.12);
}

.fav-img {
    width: 100%;
    height: 130px;
    object-fit: cover;
    display: block;
}

.fav-fallback {
    height: 130px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #fce4ec, #f8bbd0);
    font-size: 36px;
    color: #e91e63;
}

.fav-body {
    padding: 14px;
}

.fav-name {
    font-weight: 600;
    font-size: 0.85rem;
    color: #4a4a4a;
    display: block;
    text-decoration: none;
    margin-bottom: 2px;
}

.fav-name:hover { color: #f4cbdf; }

.fav-price {
    font-size: 0.8rem;
    font-weight: 700;
    color: #4a4a4a;
}

.fav-del {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: rgba(255,255,255,.85);
    backdrop-filter: blur(4px);
    border: none;
    color: #888;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    transition: all .2s;
    box-shadow: 0 2px 8px rgba(0,0,0,.08);
}

.fav-del:hover { background: #ffebee; color: #c62828; }

/* ===== TIMELINE COMENZI ===== */
.timeline {
    position: relative;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 20px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #fce4ec, #f8bbd0, transparent);
}

.tl-item {
    position: relative;
    padding-left: 56px;
    margin-bottom: 24px;
}

.tl-dot {
    position: absolute;
    left: 12px;
    top: 6px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 3px solid #fff;
    box-shadow: 0 0 0 2px #e91e63;
    z-index: 2;
}

.tl-dot-noua { background: #42a5f5; box-shadow: 0 0 0 2px #42a5f5; }
.tl-dot-in_procesare { background: #ff9800; box-shadow: 0 0 0 2px #ff9800; }
.tl-dot-livrata { background: #66bb6a; box-shadow: 0 0 0 2px #66bb6a; }
.tl-dot-anulata { background: #ef5350; box-shadow: 0 0 0 2px #ef5350; }

.tl-card {
    background: rgba(255, 255, 255, 0.705);
    border-radius: 6px;
    padding: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,.04);

    transition: all .2s;

}

.tl-card:hover {
    box-shadow: 0 8px 30px rgba(0,0,0,.08);
}

.tl-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 10px;
    flex-wrap: wrap;
    gap: 8px;
}

.tl-id {
    font-weight: 700;
    font-size: 0.95rem;
    color: #ec5e9c;
}

.tl-date {
    font-size: 0.78rem;
    color: #4a4a4a;
}

.tl-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;

}

.tl-badge-noua { background: rgba(255, 255, 255, 0.705); color: #1565c0; }
.tl-badge-in_procesare { background: rgba(255, 255, 255, 0.705); color: #e65100; }
.tl-badge-livrata { background: rgba(255, 255, 255, 0.705); color: #2e7d32; }
.tl-badge-anulata {background: rgba(255, 255, 255, 0.705); color: #c62828; }

.tl-details {
    display: flex;
    flex-wrap: wrap;
    gap: 6px 14px;
    margin-bottom: 10px;
}

.tl-detail {
    font-size: 0.8rem;
    color: #4a4a4a;
    display: flex;
    align-items: center;
    gap: 4px;
}

.tl-detail i {
    color: #ec5e9c;
    font-size: 12px;
    width: 16px;
}

.tl-products {
    background: rgba(255, 255, 255, 0.705);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 6px;
    padding: 10px 14px;
}

.tl-prod {
    display: flex;
    justify-content: space-between;
    padding: 4px 0;
    border-bottom: 1px dashed #eee;
    font-size: 0.82rem;
}

.tl-prod:last-child { border-bottom: none; }

.tl-prod-name { color: #ec5e9c; }
.tl-prod-price { color: #ec5e9c; font-weight: 600; }

.tl-total {
    text-align: right;
    font-size: 1rem;
    font-weight: 700;
    color: #ec5e9c;
    margin-top: 10px;
    padding-top: 10px;
    border-top: 2px solid #fce4ec;
}

.tl-action {
    margin-top: 12px;
}

.btn-cancel {
    background: rgba(255, 255, 255, 0.705);
    border: 1.5px solid #ffcdd2;
    color: #c62828;
    padding: 6px 16px;
    border-radius: 6px;
    font-size: 0.78rem;
    font-weight: 600;
    cursor: pointer;
    transition: all .2s;
    font-family: inherit;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-cancel:hover {
    background: rgba(255, 255, 255, 0.705);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-color: #ef5350;
}

/* ===== EMPTY STATE ===== */
.cont-empty {
    text-align: center;
    padding: 60px 20px;
    background: rgba(255, 255, 255, 0.705);
    border-radius: 6px;
    box-shadow: 0 4px 20px rgba(0,0,0,.04);
    border: 1px solid #f3f3f3;
}

.cont-empty-icon {
    font-size: 48px;
    color: #ec5e9c;
    margin-bottom: 12px;
    opacity: .6;
}

.cont-empty h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    color: #1a1a1a;
    margin: 0 0 6px;
}

.cont-empty p {
    color: #888;
    font-size: 0.9rem;
    margin: 0 0 20px;
}

.cont-empty-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #1a1a1a;
    color: #fff;
    padding: 12px 28px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all .3s;
}

.cont-empty-btn:hover {
    background: #ec5e9c;
    color: #fff;
}

/* ===== MESSAGES ===== */
.cont-msg {
    padding: 14px 18px;
    border-radius: 14px;
    margin-bottom: 20px;
    font-size: 0.88rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}

.cont-msg-success { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
.cont-msg-error { background: #ffebee; color: #c62828; border: 1px solid #ffcdd2; }

/* ===== DETALII CONT (FORMULAR) ===== */
.cont-form-card {
    background: rgba(255, 255, 255, 0.705);
    border-radius: 6px;
    padding: 28px;
    box-shadow: 0 4px 20px rgba(0,0,0,.04);
}

.cont-form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

.cont-form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.cont-form-group.full {
    grid-column: 1 / -1;
}

.cont-form-group label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #4a4a4a;
}

.cont-form-group input {
    padding: 11px 14px;
    border-radius: 10px;
    border: 1.5px solid #fbcfe8;
    font-size: 0.9rem;
    font-family: inherit;
    background: rgba(255,255,255,.8);
    transition: border-color 0.2s;
}

.cont-form-group input:focus {
    outline: none;
    border-color: #e91e8c;
}

.cont-form-divider {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: #1e1922;
    margin: 28px 0 16px;
    padding-top: 20px;
    border-top: 1px solid rgba(233, 30, 140, 0.15);
}

.cont-form-hint {
    font-size: 0.78rem;
    color: #999;
    font-weight: 400;
}

.cont-form-error {
    font-size: 0.78rem;
    color: #c62828;
    font-weight: 500;
}

.btn-save-cont {
    margin-top: 24px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #f472b6, #db2777);
    color: white;
    padding: 12px 30px;
    border-radius: 50px;
    border: none;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(219, 39, 119, 0.3);
    transition: box-shadow 0.2s;
    font-family: inherit;
}

.btn-save-cont:hover {
    box-shadow: 0 4px 20px rgba(219, 39, 119, 0.45);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
    .cont-layout {
        flex-direction: column;
    }

    .cont-sidebar {
        width: 100%;
        position: static;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
        padding: 18px;
    }

    .cont-sidebar-title {
        display: none;
    }

    .cont-nav-link {
        justify-content: flex-start;
        font-size: 0.85rem;
        padding: 12px 14px;
    }

    .cont-nav-divider {
        display: none;
    }

    .cont-nav-form,
    .cont-nav-link.logout {
        grid-column: 1 / -1;
    }

    .cont-nav-form button.cont-nav-link.logout {
        justify-content: center;
    }

    .cont-form-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .cont-wrapper { padding: 80px 16px 40px; }
    .cont-hero { padding: 32px 24px 36px; border-radius: 6px; }
    .cont-greeting { font-size: 1.6rem; }
    .cont-avatar { width: 48px; height: 48px; font-size: 1.3rem; }
    .cont-greeting-row { gap: 12px; }
    .cont-stats { gap: 8px; }
    .cont-stat { padding: 10px 14px; min-width: 80px; flex: 1; }
    .cont-stat-nr { font-size: 1.2rem; }
    .fav-card { flex: 0 0 140px; }
    .fav-fallback, .fav-img { height: 100px; }
    .tl-item { padding-left: 44px; }
    .tl-card { padding: 14px; }
    .tl-head { flex-direction: column; }
    .cont-section-title { font-size: 1.2rem; }
}

@media (max-width: 480px) {
    .cont-hero { padding: 24px 16px 28px; border-radius: 6px; }
    .cont-greeting { font-size: 1.3rem; }
    .cont-avatar { width: 40px; height: 40px; font-size: 1.1rem; }
    .cont-stat { padding: 8px 10px; }
    .cont-stat-nr { font-size: 1rem; }
}
</style>
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