<?php $__env->startSection('title', 'Find Us'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/find-us.css')); ?>">
    <!-- Scriptul oficial Cloudflare Turnstile -->
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="findus-page">

    <div class="findus-header">
        <h1>Find Us</h1>
    </div>

    
    <div class="findus-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2312.3344930174944!2d28.19265885267536!3d45.902404965171996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b65c9387e6166f%3A0x23f248c38be6a93a!2sCalea%20Republicii%2024%2C%20MD-3909%2C%20Cahul%2C%20Moldova!5e0!3m2!1sro!2s!4v1777666023963!5m2!1sro!2s"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    
    <div class="findus-flex-container">
        
        
        <div class="findus-directions">
            <h2>Cum ajungi la noi</h2>
            <p>PINK CAFÉ se află în centrul orașului Cahul, pe Calea Republicii 24a, nr. 4. Suntem ușor accesibili din orice punct al orașului.</p>
            <div class="findus-buttons">
                <a href="https://maps.google.com/?q=Calea+Republicii+24a+Cahul" target="_blank" class="btn-maps">
                     Deschide în Google Maps
                </a>
                <a href="tel:079043047" class="btn-call">
                     Sună-ne: 0790 43 047
                </a>
            </div>
        </div>

        
        <div class="findus-feedback-card">
            <h2>Formular de Feedback</h2>
            
            <form action="<?php echo e(route('contact.trimite')); ?>" method="POST" class="feedback-form">
                <?php echo csrf_field(); ?>
                
                <div class="form-group">
                    <label for="nume">Nume <span class="required">*</span></label>
                    <input type="text" id="nume" name="nume" required>
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                </div>

                <div class="form-group">
                    <label for="telefon">Telefon <span class="required">*</span></label>
                    <input type="tel" id="telefon" name="telefon" required>
                </div>
                
                <div class="form-group">
                    <label for="mesaj">Mesaj</label>
                    <textarea id="mesaj" name="mesaj" rows="4"></textarea>
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" id="consimtamant" name="consimtamant" required>
                    <label for="consimtamant">
                        Da, sunt de acord cu politica de confidențialitate și termenii și condițiile.
                    </label>
                </div>

                
                <div class="form-captcha">
                    <div class="cf-turnstile" data-sitekey="AICI_REPLANTEZI_CU_SITE_KEY_UL_TAU_DE_LA_CLOUDFLARE"></div>
                </div>

                <button type="submit" class="btn-submit-feedback">TRIMITE ÎNTREBARE</button>
            </form>
            <?php if(session('status')): ?>
            <div style="
                background-color: #fce4ec; 
                color: #880e4f; 
                padding: 15px; 
                border-radius: 8px; 
                border: 1px solid #f8bbd0; 
                margin-top: 20px; 
                text-align: center; 
                font-weight: 500;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;">
                <i class="fa-solid fa-circle-check"></i>
                <?php echo e(session('status')); ?>

            </div>
<?php endif; ?>
             <?php if($errors->any()): ?>
                <div class="alert-error"><?php echo e($errors->first()); ?></div>
             <?php endif; ?>
        </div>

    </div>

    
    <div class="findus-banner">
        <h2>Te așteptăm cu drag! </h2>
        <p>Vino să experimentezi atmosfera unică a PINK CAFÉ și să savurezi cele mai delicioase deserturi și băuturi din Cahul</p>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\pinkcafe\resources\views/find-us.blade.php ENDPATH**/ ?>