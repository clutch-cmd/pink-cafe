

<?php $__env->startSection('title', $produs->nume); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="<?php echo e(asset('css/product-custom.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="product-page">

    
    <div class="back-to-menu-wrapper">
        <a href="<?php echo e(url('/meniu')); ?>" class="btn-back-menu">
            <i class="fa-solid fa-arrow-left-long"></i> Înapoi la Meniu
        </a>
    </div>

    
    <div class="product-image-container">
        <?php if($produs->imagine && trim($produs->imagine) !== ''): ?>
            <img src="<?php echo e(asset('images/' . $produs->imagine)); ?>" alt="<?php echo e($produs->nume); ?>" class="product-main-img">
        <?php else: ?>
            
            <div class="product-fallback-icon">
                <?php if($produs->categorie == 'bauturi_calde'): ?> <i class="fa-solid fa-mug-saucer"></i>
                <?php elseif($produs->categorie == 'cocktailuri'): ?> <i class="fa-solid fa-glass-martini-alt"></i>
                <?php elseif($produs->categorie == 'lemonades'): ?> <i class="fa-solid fa-droplet"></i>
                <?php elseif($produs->categorie == 'deserturi'): ?> <i class="fa-solid fa-cake-candles"></i>
                <?php else: ?> <i class="fa-solid fa-ice-cream"></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="product-details-container">
        <span class="product-category">
            <?php if($produs->categorie == 'bauturi_calde'): ?> Băuturi Calde
            <?php elseif($produs->categorie == 'cocktailuri'): ?> Cocktailuri
            <?php elseif($produs->categorie == 'lemonades'): ?> Fresh Lemonades
            <?php elseif($produs->categorie == 'deserturi'): ?> Deserturi
            <?php else: ?> Înghețată
            <?php endif; ?>
        </span>
        
        <h1 class="product-title"><?php echo $produs->nume; ?></h1>
        
        
        <div style="display:flex; align-items:center; gap:16px; flex-wrap:wrap;">
            <div class="product-price-box" style="flex:1;">
                <span id="dinamic-price"><?php echo e(number_format($produs->pret, 0)); ?></span> lei
            </div>
            <?php if(auth()->guard()->check()): ?>
                <form method="POST" action="<?php echo e(route('favorite.toggle', $produs->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="fav-prod-btn <?php echo e(Auth::user()->favorite->contains($produs->id) ? 'fav-active' : ''); ?>" style="
                        display:flex; align-items:center; gap:8px;
                        padding:10px 20px; border-radius:50px; border:2px solid #fbcfe8;
                        background: <?php echo e(Auth::user()->favorite->contains($produs->id) ? '#fdf2f8' : 'white'); ?>;
                        color: <?php echo e(Auth::user()->favorite->contains($produs->id) ? '#db2777' : '#9ca3af'); ?>;
                        cursor:pointer; font-size:0.9rem; font-weight:600;
                        font-family:inherit; transition:all 0.2s;
                    " onmouseover="this.style.borderColor='#db2777';this.style.color='#db2777';this.style.background='#fdf2f8'" onmouseout="this.style.borderColor='#fbcfe8';this.style.color='<?php echo e(Auth::user()->favorite->contains($produs->id) ? '#db2777' : '#9ca3af'); ?>';this.style.background='<?php echo e(Auth::user()->favorite->contains($produs->id) ? '#fdf2f8' : 'white'); ?>'">
                        <i class="fa-solid fa-heart"></i>
                        <span><?php echo e(Auth::user()->favorite->contains($produs->id) ? 'În preferate' : 'Salvează'); ?></span>
                    </button>
                </form>
            <?php endif; ?>
        </div>

        
        <?php if(session('succes')): ?>
            <div style="background: rgba(74, 222, 128, 0.15); border: 1px solid #4ade80; color: #166534; padding: 12px 15px; border-radius: 12px; margin-bottom: 20px; text-align: center; font-weight: 600; font-size: 0.95rem;">
                <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> <?php echo e(session('succes')); ?>

            </div>
        <?php endif; ?>

        
        <form action="<?php echo e(route('comanda.trimite')); ?>" method="POST">
        <?php echo csrf_field(); ?>
            <input type="hidden" name="produs_id" value="<?php echo e($produs->id); ?>">

            
            <?php if(in_array($produs->categorie, ['bauturi_calde', 'cocktailuri', 'lemonades'])): ?>
                <div class="customizer-section">
                    <h3 class="section-subtitle"><i class="fa-solid fa-sliders" style="color: #e91e8c;"></i> Personalizează băutura</h3>
                    
                    
                    <?php if($produs->categorie == 'bauturi_calde'): ?>
                        <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 8px;">Alege laptele:</p>
                        <div class="option-group">
                            <label class="option-label">
                                <span><input type="radio" name="optiune_lapte" value="normal" data-price="0" checked> Lapte Normal</span>
                                <span class="option-price">+0 lei</span>
                            </label>
                            <label class="option-label">
                                <span><input type="radio" name="optiune_lapte" value="migdale" data-price="15"> Lapte de Migdale</span>
                                <span class="option-price">+15 lei</span>
                            </label>
                            <label class="option-label">
                                <span><input type="radio" name="optiune_lapte" value="ovaz" data-price="15"> Lapte de Ovăz</span>
                                <span class="option-price">+15 lei</span>
                            </label>
                        </div>
                    <?php endif; ?>

                    
                    <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 8px; margin-top: 15px;">Adaugă extra topping:</p>
                    <div class="option-group">
                        <label class="option-label">
                            <span><input type="checkbox" name="toppings[]" value="frisca" data-price="10" class="topping-cb"> Frișcă Premium</span>
                            <span class="option-price">+10 lei</span>
                        </label>
                        <label class="option-label">
                            <span><input type="checkbox" name="toppings[]" value="sirop_vanilie" data-price="8" class="topping-cb"> Sirop Vanilie</span>
                            <span class="option-price">+8 lei</span>
                        </label>
                        <label class="option-label">
                            <span><input type="checkbox" name="toppings[]" value="gheata" data-price="0" class="topping-cb"> Gheață Extra</span>
                            <span class="option-price">+0 lei</span>
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="reservation-section">
                <h3 class="section-subtitle"><i class="fa-solid fa-calendar-days" style="color: #9c27b0;"></i> Programează sau Rezervă masă</h3>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="res_date">Alege Data</label>
                        <input type="date" id="res_date" name="data_rezervare" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="res_time">Alege Ora</label>
                        <input type="time" id="res_time" name="ora_rezervare" class="form-control" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="res_pers">Nr. Persoane (opțional)</label>
                        <select id="res_pers" name="numar_persoane" class="form-control">
                            <option value="">Doar ridicare (fără masă)</option>
                            <option value="1">1 Persoană (Masă)</option>
                            <option value="2">2 Persoane (Masă)</option>
                            <option value="4">4 Persoane (Masă)</option>
                            <option value="6">6+ Persoane (Masă)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="res_obs">Mențiuni speciale</label>
                        <input type="text" id="res_obs" name="mentiuni_speciale" class="form-control" placeholder="Ex: La geam, etc.">
                    </div>
                </div>
            </div>

            
            <?php if($produs->alergeni): ?>
                <div class="alergeni-alert">
                    <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.1rem; margin-top: 2px;"></i>
                    <div>
                        <strong>Informație Alergeni:</strong> <?php echo e($produs->alergeni); ?>

                    </div>
                </div>
            <?php endif; ?>

            
            <button type="submit" class="btn-action-order">
                <i class="fa-solid fa-basket-shopping"></i> Continuă spre Comandă
            </button>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ro.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- LOGICĂ FLATPICKR PENTRU CALENDAR ---
        flatpickr("#res_date", {
            locale: "ro",                  // Setează calendarul în română
            minDate: "today",              // Blochează complet zilele din trecut
            dateFormat: "Y-m-d",           // Formatul trimis către baza de date
            altInput: true,                // Creează un input frumos mascat
            altFormat: "d F Y",            // Cum vede clientul data (ex: 05 Iunie 2026)
            disableMobile: "true"          // Forțează designul unitar și pe telefoane
        });

        // --- LOGICĂ FLATPICKR PENTRU CEAS ---
        flatpickr("#res_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            disableMobile: "true"
        });

        // --- CALCULATOR DINAMIC DE PREȚ ---
        const pretBaza = <?php echo e($produs->pret); ?>;
        const elementPret = document.getElementById('dinamic-price');
        const inputsLapte = document.querySelectorAll('input[name="optiune_lapte"]');
        const inputsToppings = document.querySelectorAll('.topping-cb');

        function calculeazaPretFinal() {
            let pretAdaugat = 0;
            inputsLapte.forEach(radio => { if(radio.checked) pretAdaugat += parseFloat(radio.getAttribute('data-price')); });
            inputsToppings.forEach(cb => { if(cb.checked) pretAdaugat += parseFloat(cb.getAttribute('data-price')); });
            const pretFinal = pretBaza + pretAdaugat;
            elementPret.textContent = pretFinal.toLocaleString('ro-RO', { minimumFractionDigits: 0 });
        }

        inputsLapte.forEach(radio => radio.addEventListener('change', calculeazaPretFinal));
        inputsToppings.forEach(cb => cb.addEventListener('change', calculeazaPretFinal));
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/produs.blade.php ENDPATH**/ ?>