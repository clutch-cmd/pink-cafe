

<?php $__env->startSection('title', 'Comandă Online'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/comanda.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="comanda-page">

    <div class="comanda-header">
        <h1>Comandă Online</h1>
        <p>Livrare rapidă la domiciliu în Cahul</p>

        <div class="comanda-steps">
            <div class="step active" id="step1indicator">
                <div class="step-circle">1</div>
                <span>Selectează Produse</span>
            </div>
            <div class="step-line"></div>
            <div class="step" id="step2indicator">
                <div class="step-circle">2</div>
                <span>Informații Livrare</span>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="comanda-error">
            <i class="fa-solid fa-circle-exclamation"></i> <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('comanda.store')); ?>" id="comandaForm">
        <?php echo csrf_field(); ?>

        <div class="comanda-layout">

            
            <div class="comanda-left">

                
                <div id="step1">
                    <h2 class="comanda-section-title">Selectează Produsele</h2>

                    
                    <div class="comanda-tabs">
                        <button type="button" class="tab-btn active" onclick="showCategory('bauturi_calde', this)">Băuturi Calde</button>
                        <button type="button" class="tab-btn" onclick="showCategory('cocktailuri', this)">Cocktailuri</button>
                        <button type="button" class="tab-btn" onclick="showCategory('lemonades', this)">Lemonades</button>
                        <button type="button" class="tab-btn" onclick="showCategory('deserturi', this)">Deserturi</button>
                        <button type="button" class="tab-btn" onclick="showCategory('inghetata', this)">Înghețată</button>
                        <button type="button" class="tab-btn" onclick="showCategory('sandvisuri_burgere', this)">Sandvișuri & Burgere</button>
                    </div>

                    
                    
                    <?php $__currentLoopData = ['bauturi_calde' => $bauturiCalde, 'cocktailuri' => $cocktailuri, 'lemonades' => $lemonades, 'deserturi' => $deserturi, 'inghetata' => $inghetata , 'sandvisuri_burgere' => $sandvisuri]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categorisita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="comanda-products <?php echo e($key != 'bauturi_calde' ? 'hidden' : ''); ?>" id="cat_<?php echo e($key); ?>">
                            <?php $__currentLoopData = $categorisita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="comanda-product-item">
                                    <div class="product-info">
                                        <span class="product-name"><?php echo e($produs->nume); ?></span>
                                        <span class="product-pret"><?php echo e(number_format($produs->pret, 0)); ?> lei</span>
                                    </div>
                                    <button type="button" class="btn-add-product" onclick="addToCart(<?php echo e($produs->id); ?>, '<?php echo e(addslashes($produs->nume)); ?>', <?php echo e($produs->pret); ?>, '/images/<?php echo e($produs->imagine); ?>')">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn-continua" style="display:block; text-align:center; text-decoration:none">
                            <i class="fas fa-lock"></i> Autentifică-te pentru a comanda
                        </a>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <button type="button" class="btn-continua" id="btnContinua" onclick="goToStep2()">
                            Continuă la Informații Livrare
                        </button>
                    <?php endif; ?>
                </div>

                
                <div id="step2" class="hidden">
                    <h2 class="comanda-section-title">Informații Livrare</h2>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-user"></i> Nume Complet *</label>
                        <input type="text" name="nume" placeholder="Introduceți numele dvs." value="<?php echo e(old('nume')); ?>" required>
                    </div>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-phone"></i> Telefon *</label>
                        <input type="text" name="telefon" placeholder="0790 43 047" value="<?php echo e(old('telefon')); ?>" required>
                    </div>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-location-dot"></i> Adresă Livrare *</label>
                        <input type="text" name="adresa" placeholder="Strada, numărul casei, apartamentul" value="<?php echo e(old('adresa')); ?>" required>
                    </div>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-comment-dots"></i> Comentarii (opțional)</label>
                        <textarea name="comentarii" placeholder="Instrucțiuni speciale pentru livrare..."><?php echo e(old('comentarii')); ?></textarea>
                    </div>

                    <div class="comanda-step2-buttons">
                        <button type="button" class="btn-inapoi" onclick="goToStep1()">
                            <i class="fa-solid fa-chevron-left"></i> Înapoi
                        </button>
                        <button type="submit" class="btn-plaseaza" id="btnPlaseaza">
                            <i class="fa-solid fa-cart-shopping"></i> Plasează Comanda
                        </button>
                    </div>
                </div>

            </div>

            
            <div class="comanda-right">
                <div class="cos-container">
                    <h3 class="cos-title">Coșul Tău</h3>

                    <div id="cosGol" class="cos-gol">
                        <div class="cos-gol-icon"><i class="fa-solid fa-basket-shopping"></i></div>
                        <p>Coșul este gol</p>
                    </div>

                    <div id="cosItems"></div>

                    <div id="cosTotal" class="cos-total hidden">
                        <span>Total:</span>
                        <span id="totalPret" class="cos-total-pret">0 lei</span>
                    </div>

                    <div class="cos-info">
                        <?php if(auth()->guard()->guest()): ?>
                            <div class="cos-auth-warning">
                                <i class="fas fa-lock"></i>
                                <p>Pentru a plasa o comandă este necesar să fii autentificat.</p>
                            </div>
                        <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                            <div class="cos-livrare-info">
                                <p><i class="fas fa-phone"></i> Sau sună: <strong>0790 43 047</strong></p>
                                <div class="cos-livrare-detalii">
                                    <div class="livrare-row" id="livrareRow">
                                        <i class="fas fa-truck"></i>
                                        <div>
                                            <span id="livrareText">Livrare: <strong>calculare...</strong></span>
                                            <small>Livrare gratuită pentru comenzi peste 200 lei</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        
        <div id="hiddenInputs"></div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
let localCart = {};

function addToCart(id, nume, pret, imagine) {
    if (localCart[id]) {
        localCart[id].cantitate++;
    } else {
        localCart[id] = { id, nume, pret, imagine, cantitate: 1 };
    }
    // Apelează și funcția din navbar pentru a actualiza coșul acolo
    if (typeof addItemToCart === 'function') {
        addItemToCart(id, nume, pret, imagine);
    }
    updateCart();
}

function removeFromCart(id) {
    if (localCart[id]) {
        localCart[id].cantitate--;
        if (localCart[id].cantitate <= 0) {
            delete localCart[id];
        }
    }
    updateCart();
}

function deleteFromCart(id) {
    delete localCart[id];
    updateCart();
}

function updateCart() {
    const cosItems = document.getElementById('cosItems');
    const cosGol = document.getElementById('cosGol');
    const cosTotal = document.getElementById('cosTotal');
    const hiddenInputs = document.getElementById('hiddenInputs');
    const totalPret = document.getElementById('totalPret');
    const btnPlaseaza = document.getElementById('btnPlaseaza');

    cosItems.innerHTML = '';
    hiddenInputs.innerHTML = '';

    let total = 0;
    let hasItems = Object.keys(localCart).length > 0;

    if (hasItems) {
        cosGol.classList.add('hidden');
        cosTotal.classList.remove('hidden');

        for (let id in localCart) {
            const item = localCart[id];
            total += item.pret * item.cantitate;

            cosItems.innerHTML += `
                <div class="cos-item">
                    <div class="cos-item-info">
                        <span class="cos-item-name">${item.nume}</span>
                        <span class="cos-item-pret">${item.pret} lei × ${item.cantitate}</span>
                    </div>
                    <div class="cos-item-controls">
                        <button type="button" onclick="removeFromCart(${id})"><i class="fa-solid fa-minus"></i></button>
                        <span>${item.cantitate}</span>
                        <button type="button" onclick="addToCart(${id}, '${item.nume}', ${item.pret})"><i class="fa-solid fa-plus"></i></button>
                        <button type="button" class="cos-delete" onclick="deleteFromCart(${id})"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            `;

            hiddenInputs.innerHTML += `<input type="hidden" name="produse[${id}]" value="${item.cantitate}">`;
        }

        totalPret.textContent = total + ' lei';

        if (btnPlaseaza) {
            const livrare = total >= 200 ? 0 : 25;
            const totalCuLivrare = total + livrare;
            btnPlaseaza.innerHTML = `<i class="fas fa-shopping-cart"></i> Plasează Comanda (${totalCuLivrare} lei)`;
        }
    } else {
        cosGol.classList.remove('hidden');
        cosTotal.classList.add('hidden');
    }

    const livrareRow = document.getElementById('livrareRow');
    const livrareText = document.getElementById('livrareText');

    if (livrareRow && livrareText) {
        if (!hasItems) {
            livrareText.innerHTML = 'Livrare: <strong>—</strong>';
        } else if (total >= 200) {
            livrareText.innerHTML = 'Livrare: <strong style="color:#22c55e">Gratuită</strong>';
            livrareRow.style.background = '#f0fdf4';
        } else {
            const ramane = 200 - total;
            livrareText.innerHTML = `Livrare: <strong>25 lei</strong> <span style="color:#e91e8c; font-size:0.78rem">(mai adaugă ${ramane} lei pentru livrare gratuită)</span>`;
            livrareRow.style.background = '#fff8f0';
        }
    }
}

function showCategory(category, btn) {
    document.querySelectorAll('.comanda-products').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('cat_' + category).classList.remove('hidden');
    btn.classList.add('active');
}

function goToStep2() {
    if (Object.keys(localCart).length === 0) {
        alert('Selectează cel puțin un produs!');
        return;
    }
    document.getElementById('step1').classList.add('hidden');
    document.getElementById('step2').classList.remove('hidden');
    document.getElementById('step1indicator').classList.remove('active');
    document.getElementById('step2indicator').classList.add('active');
    window.scrollTo(0, 0);
}

function goToStep1() {
    document.getElementById('step2').classList.add('hidden');
    document.getElementById('step1').classList.remove('hidden');
    document.getElementById('step2indicator').classList.remove('active');
    document.getElementById('step1indicator').classList.add('active');
    window.scrollTo(0, 0);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/comanda.blade.php ENDPATH**/ ?>