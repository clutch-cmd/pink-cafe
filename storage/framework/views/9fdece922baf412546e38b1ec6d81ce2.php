<nav class="navbar" id="navbar">
    
    <div class="navbar-topbar" id="navbarTopbar">
        <div class="navbar-topbar-container">
            <div class="navbar-topbar-info">
                <span><i class="fa-solid fa-phone"></i> 0790 43 047</span>
                <span><i class="fa-solid fa-clock"></i> Luni - Duminică: 07:00 - 22:00</span>
            </div>
            <div class="navbar-topbar-social">
                <a href="https://instagram.com/pink_cafe_cahul" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://tiktok.com/@pink_cafe_cahul" target="_blank" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
    </div>

    <div class="navbar-container">
        
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
            <div class="navbar-logo-icon">
                <img src="<?php echo e(asset('images/pc-logo.png')); ?>" alt="Pink Café">
            </div>
        </a>

        
        <div class="navbar-links" id="navbarLinks">
            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a>
            <a href="<?php echo e(route('meniu')); ?>" class="nav-link <?php echo e(request()->routeIs('meniu') ? 'active' : ''); ?>">Meniu</a>
            <a href="<?php echo e(route('find-us')); ?>" class="nav-link <?php echo e(request()->routeIs('find-us') ? 'active' : ''); ?>">Find Us & Contacte</a>
        </div>

        
        <div class="navbar-right">
            <div class="navbar-auth">
                <?php if(auth()->guard()->check()): ?>
                    <div class="navbar-user">
                        <?php if(Auth::user()->rol === 'admin'): ?>
                            <button type="button" class="navbar-user-info" id="userDropdownBtn" onclick="toggleUserDropdown()">
                                <div class="navbar-avatar">
                                    <i class="fa-solid fa-gear"></i>
                                </div>
                                <span class="navbar-username">Admin</span>
                                <i class="fa-solid fa-chevron-down navbar-dropdown-arrow"></i>
                            </button>
                            <div class="navbar-dropdown-menu" id="userDropdownMenu">
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="navbar-dropdown-item">
                                    <i class="fa-solid fa-gauge"></i> Panou control
                                </a>
                                <div class="navbar-dropdown-divider"></div>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" class="navbar-logout-form">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="navbar-dropdown-item logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <button type="button" class="navbar-user-info" id="userDropdownBtn" onclick="toggleUserDropdown()">
                                <div class="navbar-avatar">
                                    <i class="fa-solid fa-circle-user"></i>
                                </div>
                                <span class="navbar-username"><?php echo e(Auth::user()->name); ?></span>
                                <i class="fa-solid fa-chevron-down navbar-dropdown-arrow"></i>
                            </button>
                            <div class="navbar-dropdown-menu" id="userDropdownMenu">
                                <a href="<?php echo e(route('cont.comenzi')); ?>#panou" class="navbar-dropdown-item"><i class="fa-solid fa-gauge"></i> Panou Control</a>
                                <a href="<?php echo e(route('cont.comenzi')); ?>#comenzi" class="navbar-dropdown-item"><i class="fa-solid fa-bag-shopping"></i> Comenzi</a>
                                <a href="<?php echo e(route('cont.comenzi')); ?>#favorite" class="navbar-dropdown-item"><i class="fa-solid fa-heart"></i> Favorite</a>
                                <div class="navbar-dropdown-divider"></div>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" class="navbar-logout-form">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="navbar-dropdown-item logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="login-btn">
                        <div class="login-icon-wrapper"><i class="fa-solid fa-user"></i></div>
                        <span>Logare</span>
                    </a>
                <?php endif; ?>
            </div>

            
            <?php if(auth()->guard()->check()): ?>
            <button class="navbar-cart-btn" id="cartBtn" onclick="toggleCartPanel()" aria-label="Coș">
                <i class="fa-solid fa-basket-shopping"></i>
                <span class="navbar-cart-badge" id="cartBadge">0</span>
            </button>
            <?php endif; ?>
        </div>

        
        <button class="navbar-hamburger" id="hamburgerBtn" onclick="toggleMobileMenu()">
            <i class="fa-solid fa-bars" id="hamburgerIcon"></i>
        </button>
    </div>

    
    <div class="mobile-menu" id="mobileMenu">
        <a href="<?php echo e(route('home')); ?>" class="mobile-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" onclick="closeMobileMenu()">Home</a>
        <a href="<?php echo e(route('meniu')); ?>" class="mobile-link <?php echo e(request()->routeIs('meniu') ? 'active' : ''); ?>" onclick="closeMobileMenu()">Meniu</a>
        <a href="<?php echo e(route('find-us')); ?>" class="mobile-link <?php echo e(request()->routeIs('find-us') ? 'active' : ''); ?>" onclick="closeMobileMenu()">Find Us & Contacte</a>

        <div class="mobile-auth">
            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->rol === 'admin'): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="mobile-link" onclick="closeMobileMenu()">
                        <i class="fa-solid fa-gear"></i> Admin
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('cont.comenzi')); ?>" class="mobile-link" onclick="closeMobileMenu()">
                        <i class="fa-solid fa-circle-user"></i> <?php echo e(Auth::user()->name); ?>

                    </a>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="mobile-logout-btn">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="login-btn mobile-login-btn" onclick="closeMobileMenu()">
                    <div class="login-icon-wrapper">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span>Logare</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>


<div class="cart-overlay" id="cartOverlay" onclick="closeCartPanel()"></div>
<div class="cart-panel" id="cartPanel">
    
    <div class="cart-panel-header">
        <h3>Coș</h3>
        <button class="cart-panel-close" onclick="closeCartPanel()"><i class="fa-solid fa-xmark"></i> Închide</button>
    </div>
    
    <div class="cart-panel-body" id="cartPanelBody">
        <div class="cart-panel-empty">
            <i class="fa-solid fa-basket-shopping"></i>
            <p>Coșul tău este gol</p>
        </div>
        <div class="cart-panel-items" id="cartPanelItems"></div>
    </div>
    
    <div class="cart-panel-footer" id="cartPanelFooter" style="display:none;">
        <div class="cart-subtotal">
            <span>Sub-total:</span>
            <span id="cartPanelTotalPrice">0 lei</span>
        </div>
        
        
        <div class="cart-free-shipping" id="freeShippingContainer">
            <p id="freeShippingText">Adăugați în sumă de X lei pentru livrare gratuită!</p>
            <div class="free-shipping-bar">
                <div class="free-shipping-progress" id="freeShippingProgress"></div>
            </div>
        </div>
        
        <div class="cart-action-buttons">
            <button class="cart-btn-primary" onclick="chooseDelivery()">Finalizare Comandă</button>
            <button class="cart-btn-secondary" onclick="chooseReservation()">Rezervare Masă</button>
        </div>
    </div>

    
    <div class="cart-panel-form" id="cartFormDelivery" style="display:none;">
        <h4>Detalii Livrare</h4>
        <input type="text" id="deliveryName" placeholder="Nume complet" required>
        <input type="tel" id="deliveryPhone" placeholder="Telefon" required>
        <input type="text" id="deliveryAddress" placeholder="Adresă livrare" required>
        <textarea id="deliveryNotes" placeholder="Comentarii (opțional)" rows="2"></textarea>
        <button class="cart-btn-submit" onclick="submitDelivery()">Confirmă Comanda</button>
        <button class="cart-btn-back" onclick="backToCartOptions()">Înapoi la coș</button>
    </div>

    
    <div class="cart-panel-form" id="cartFormReservation" style="display:none;">
        <h4>Detalii Rezervare</h4>
        <input type="text" id="resName" placeholder="Nume complet" required>
        <input type="tel" id="resPhone" placeholder="Telefon" required>
        <input type="date" id="resDate" required>
        <input type="time" id="resTime" required>
        <select id="resPersons">
            <option value="">Nr. Persoane</option>
            <option value="1">1 Persoană</option>
            <option value="2">2 Persoane</option>
            <option value="4">4 Persoane</option>
        </select>
        <textarea id="resNotes" placeholder="Mențiuni speciale (opțional)" rows="2"></textarea>
        <button class="cart-btn-submit" onclick="submitReservation()">Trimite Rezervarea</button>
        <button class="cart-btn-back" onclick="backToCartOptions()">Înapoi la coș</button>
    </div>
</div>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const icon = document.getElementById('hamburgerIcon');
    menu.classList.toggle('open');
    if (menu.classList.contains('open')) {
        icon.className = 'fa-solid fa-xmark';
    } else {
        icon.className = 'fa-solid fa-bars';
    }
}

function closeMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const icon = document.getElementById('hamburgerIcon');
    menu.classList.remove('open');
    icon.className = 'fa-solid fa-bars';
}

function toggleUserDropdown() {
    const menu = document.getElementById('userDropdownMenu');
    const btn = document.getElementById('userDropdownBtn');
    menu.classList.toggle('open');
    btn.classList.toggle('open');
}

function closeUserDropdown() {
    const menu = document.getElementById('userDropdownMenu');
    const btn = document.getElementById('userDropdownBtn');
    if (menu) menu.classList.remove('open');
    if (btn) btn.classList.remove('open');
}

// Close mobile menu and user dropdown on click outside
document.addEventListener('click', function(e) {
    const nav = document.getElementById('navbar');
    const menu = document.getElementById('mobileMenu');
    if (nav && !nav.contains(e.target) && menu && menu.classList.contains('open')) {
        closeMobileMenu();
    }

    const dropdownBtn = document.getElementById('userDropdownBtn');
    const dropdownMenu = document.getElementById('userDropdownMenu');
    if (dropdownMenu && dropdownBtn && !dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
        closeUserDropdown();
    }
});

// Ascunde/arata topbar-ul de informatii la scroll
(function() {
    const topbar = document.getElementById('navbarTopbar');
    if (!topbar) return;

    let lastScroll = window.scrollY;
    const threshold = 10;

    window.addEventListener('scroll', function() {
        const currentScroll = window.scrollY;

        if (currentScroll <= 0) {
            topbar.classList.remove('collapsed');
        } else if (currentScroll > lastScroll && currentScroll > threshold) {
            // scroll down — hide topbar
            topbar.classList.add('collapsed');
        }
        // scroll up does NOT show topbar — only at the very top (currentScroll <= 0)

        lastScroll = currentScroll;
    }, { passive: true });
})();

// ===== CART SYSTEM =====
let cart = JSON.parse(localStorage.getItem('pinkcafe_cart') || '[]');
updateCartBadge();

function toggleCartPanel() {
    const panel = document.getElementById('cartPanel');
    const overlay = document.getElementById('cartOverlay');
    panel.classList.toggle('open');
    overlay.classList.toggle('open');
    if (panel.classList.contains('open')) renderCart();
}

function closeCartPanel() {
    document.getElementById('cartPanel').classList.remove('open');
    document.getElementById('cartOverlay').classList.remove('open');
    // Reset all forms
    document.getElementById('cartFormDelivery').style.display = 'none';
    document.getElementById('cartFormReservation').style.display = 'none';
    document.getElementById('cartPanelFooter').style.display = cart.length > 0 ? 'flex' : 'none';
    document.getElementById('cartPanelBody').style.display = 'block';
}

function addItemToCart(id, name, price, image, options) {
    const existing = cart.findIndex(item => item.id === id && JSON.stringify(item.options) === JSON.stringify(options));
    if (existing >= 0) {
        cart[existing].qty += 1;
    } else {
        cart.push({ id, name, price, image, qty: 1, options: options || {} });
    }
    localStorage.setItem('pinkcafe_cart', JSON.stringify(cart));
    updateCartBadge();
    renderCart();
    // Show a brief notification
    const badge = document.getElementById('cartBadge');
    badge.style.transform = 'scale(1.3)';
    setTimeout(() => badge.style.transform = 'scale(1)', 200);
}

function removeFromCart(index) {
    cart.splice(index, 1);
    localStorage.setItem('pinkcafe_cart', JSON.stringify(cart));
    updateCartBadge();
    renderCart();
}

function changeQty(index, delta) {
    cart[index].qty += delta;
    if (cart[index].qty <= 0) cart.splice(index, 1);
    localStorage.setItem('pinkcafe_cart', JSON.stringify(cart));
    updateCartBadge();
    renderCart();
}

function updateCartBadge() {
    const badge = document.getElementById('cartBadge');
    const total = cart.reduce((sum, item) => sum + item.qty, 0);
    badge.textContent = total;
    badge.style.display = total > 0 ? 'flex' : 'none';
}
function renderCart() {
    const items = document.getElementById('cartPanelItems');
    const empty = document.querySelector('.cart-panel-empty');
    const footer = document.getElementById('cartPanelFooter');
    const totalPrice = document.getElementById('cartPanelTotalPrice');

    items.innerHTML = '';
    let sum = 0;

    if (cart.length === 0) {
        empty.style.display = 'block';
        footer.style.display = 'none';
        return;
    }

    empty.style.display = 'none';
    footer.style.display = 'flex';

    cart.forEach((item, index) => {
        sum += item.price * item.qty;
        const optionsText = item.options && Object.keys(item.options).length ? Object.values(item.options).join(', ') : '';
        
        // Daca nu exista imagine, punem o iconita placeholder cu ceasca
        const imageHtml = item.image 
            ? `<img src="${item.image}" alt="${item.name}">` 
            : `<i class="fa-solid fa-mug-hot" style="color:#fbcfe8; font-size:24px;"></i>`;

        items.innerHTML += `
            <div class="cart-panel-item">
                <div class="cart-item-image">
                    ${imageHtml}
                </div>
                <div class="cart-item-details">
                    <div class="cart-item-name-row">
                        <span class="cart-item-name">${item.name}</span>
                        <button class="cart-item-remove" onclick="removeFromCart(${index})"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    ${optionsText ? `<small class="cart-item-options">${optionsText}</small>` : ''}
                    <div class="cart-item-price-row">
                        <span class="cart-item-qty-price">${item.qty} × <span>${item.price} lei</span></span>
                        <div class="cart-item-qty-controls">
                            <button onclick="changeQty(${index}, -1)"><i class="fa-solid fa-minus"></i></button>
                            <span>${item.qty}</span>
                            <button onclick="changeQty(${index}, 1)"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    totalPrice.textContent = sum.toFixed(2) + ' lei';

    // --- LOGICA LIVRARE GRATUITA ---
    const freeShippingThreshold = 200; // Limita de 200 lei
    const progressText = document.getElementById('freeShippingText');
    const progressBar = document.getElementById('freeShippingProgress');

    if (sum >= freeShippingThreshold) {
        progressText.innerHTML = 'Felicitări! Ai obținut <strong>livrare gratuită</strong>!';
        progressBar.style.width = '100%';
        progressBar.style.backgroundColor = '#10b981'; // Se face verde cand e atinsa
    } else {
        const difference = freeShippingThreshold - sum;
        progressText.innerHTML = `Adăugați în sumă de <strong>${difference.toFixed(2)} lei</strong> pentru livrare gratuită!`;
        progressBar.style.width = `${(sum / freeShippingThreshold) * 100}%`;
        progressBar.style.backgroundColor = '#db2777'; // Bara roz cat timp se incarca
    }
}

function chooseDelivery() {
    <?php if(auth()->guard()->guest()): ?>
    window.location.href = '<?php echo e(route("login")); ?>';
    return;
    <?php endif; ?>
    document.getElementById('cartPanelBody').style.display = 'none';
    document.getElementById('cartPanelFooter').style.display = 'none';
    const form = document.getElementById('cartFormDelivery');
    form.style.display = 'flex';
    const userNameEl = document.querySelector('.navbar-username');
    if (userNameEl) document.getElementById('deliveryName').value = userNameEl.textContent.trim();
}

function chooseReservation() {
    <?php if(auth()->guard()->guest()): ?>
    window.location.href = '<?php echo e(route("login")); ?>';
    return;
    <?php endif; ?>
    document.getElementById('cartPanelBody').style.display = 'none';
    document.getElementById('cartPanelFooter').style.display = 'none';
    document.getElementById('cartFormReservation').style.display = 'flex';
    const userNameEl = document.querySelector('.navbar-username');
    if (userNameEl) document.getElementById('resName').value = userNameEl.textContent.trim();
    const dateInput = document.getElementById('resDate');
    dateInput.min = new Date().toISOString().split('T')[0];
}

function backToCartOptions() {
    document.getElementById('cartFormDelivery').style.display = 'none';
    document.getElementById('cartFormReservation').style.display = 'none';
    document.getElementById('cartPanelBody').style.display = 'block';
    document.getElementById('cartPanelFooter').style.display = cart.length > 0 ? 'flex' : 'none';
}

function submitDelivery() {
    const name = document.getElementById('deliveryName').value.trim();
    const phone = document.getElementById('deliveryPhone').value.trim();
    const address = document.getElementById('deliveryAddress').value.trim();
    if (!name || !phone || !address) { alert('Completează toate câmpurile obligatorii!'); return; }
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '<?php echo e(route("comanda.store")); ?>';
    form.innerHTML = `
        <?php echo csrf_field(); ?>
        <input type="hidden" name="nume" value="${name}">
        <input type="hidden" name="telefon" value="${phone}">
        <input type="hidden" name="adresa" value="${address}">
        <input type="hidden" name="comentarii" value="${document.getElementById('deliveryNotes').value}">
        ${cart.map(item => `<input type="hidden" name="produse[${item.id}]" value="${item.qty}">`).join('')}
    `;
    localStorage.removeItem('pinkcafe_cart');
    document.body.appendChild(form);
    form.submit();
}

function submitReservation() {
    const name = document.getElementById('resName').value.trim();
    const phone = document.getElementById('resPhone').value.trim();
    const date = document.getElementById('resDate').value;
    const time = document.getElementById('resTime').value;
    if (!name || !phone || !date || !time) { alert('Completează toate câmpurile obligatorii!'); return; }
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '<?php echo e(route("comanda.store")); ?>';
    form.innerHTML = `
        <?php echo csrf_field(); ?>
        <input type="hidden" name="nume" value="${name}">
        <input type="hidden" name="telefon" value="${phone}">
        <input type="hidden" name="adresa" value="Rezervare la restaurant">
        <input type="hidden" name="comentarii" value="${document.getElementById('resNotes').value}">
        <input type="hidden" name="data_rezervare" value="${date}">
        <input type="hidden" name="ora_rezervare" value="${time}">
        <input type="hidden" name="numar_persoane" value="${document.getElementById('resPersons').value}">
        ${cart.map(item => `<input type="hidden" name="produse[${item.id}]" value="${item.qty}">`).join('')}
    `;
    localStorage.removeItem('pinkcafe_cart');
    document.body.appendChild(form);
    form.submit();
}
</script><?php /**PATH D:\pinkcafe\resources\views/components/navbar.blade.php ENDPATH**/ ?>