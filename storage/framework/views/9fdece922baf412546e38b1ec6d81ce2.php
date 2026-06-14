<nav class="navbar" id="navbar">
    <div class="navbar-container">
        
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
            <div class="navbar-logo-icon">
                <i class="fa-solid fa-mug-hot" style="color: rgb(255, 255, 255);"></i>
            </div>
            <span class="navbar-title">PINK CAFÉ</span>
        </a>

        
        <div class="navbar-links" id="navbarLinks">
            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a>
            <a href="<?php echo e(route('meniu')); ?>" class="nav-link <?php echo e(request()->routeIs('meniu') ? 'active' : ''); ?>">Meniu</a>
            <a href="<?php echo e(route('find-us')); ?>" class="nav-link <?php echo e(request()->routeIs('find-us') ? 'active' : ''); ?>">Find Us & Contacte</a>
        </div>

        
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
                                <button type="submit" class="navbar-dropdown-item logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare
                                </button>
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
                            <a href="<?php echo e(route('cont.comenzi')); ?>" class="navbar-dropdown-item">
                                <i class="fa-solid fa-bag-shopping"></i> Comenzi
                            </a>
                            <a href="<?php echo e(route('cont.comenzi')); ?>#favorite" class="navbar-dropdown-item">
                                <i class="fa-solid fa-heart"></i> Favorite
                            </a>
                            <div class="navbar-dropdown-divider"></div>
                            <form method="POST" action="<?php echo e(route('logout')); ?>" class="navbar-logout-form">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="navbar-dropdown-item logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="login-btn">
                    <div class="login-icon-wrapper">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span>Logare</span>
                </a>
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
</script><?php /**PATH D:\pinkcafe\resources\views/components/navbar.blade.php ENDPATH**/ ?>